<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Tumbler;
use App\Models\User;
use App\Notifications\OrderDelivered;
use App\Notifications\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Str;

class OrderController extends Controller
{
    //
    public function submitOrder(Request $request)
    {
        try {
            $trackingNumbler = 'THMB' . str(Str::random(8));
            $request->validate([
                'username' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'payment' => 'required|in:cash,online',
                'addresses' => 'required_without:coords|array',
                'addresses.*' => 'string|max:500',
                'coords' => ['required_without:addresses', 'string', 'regex:/^-?\d+\.\d+,\s*-?\d+\.\d+$/'],
                'bank_slip' => 'required_if:payment,online|image|mimes:jpeg,png,jpg|max:2048',
                'selected_location_name' => 'nullable|string' // Add this line
            ]);

            $user = Auth::user();
            $cart = session('cart', []);

            if (empty($cart)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Your cart is empty.'
                ], 400);
            }

            // Calculate total
            $total = array_reduce($cart, function ($carry, $item) {
                return $carry + ($item['price'] * $item['quantity']);
            }, 0);

            // Handle address
            $address = '';
            if ($request->has('addresses')) {
                $address = implode("\n", $request->addresses);
            } elseif ($request->has('coords')) {
                $address = $request->coords;
                if ($request->has('selected_location_name')) {
                    $address .= "\n" . $request->selected_location_name;
                }
            }

            // Handle bank slip upload for online payment
            $bankSlipPath = null;
            if ($request->payment === 'online' && $request->hasFile('bank_slip')) {
                $bankSlipPath = $request->file('bank_slip')->store('bank_slips', 'public');
            }

            DB::beginTransaction();

            try {
                // Create order
                $order = Order::create([
                    'user_id' => $user->id,
                    'total' => $total,
                    'tracking_number' => $trackingNumbler,
                    'shipping_address' => $address,
                    'payment_method' => $request->payment,
                    'phone_number' => $request->phone,
                    'status' => $request->payment === 'cash' ? 'pending' : 'processing',
                    'coordinates' => $request->coords ?? null,
                    'bank_slip_path' => $bankSlipPath
                ]);

                // Create order items
                foreach ($cart as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'tumbler_id' => $item['tumbler_id'] ?? null,
                        'name' => $item['name'],
                        'image' => $item['image'],
                        'color' => $item['color'] ?? null,
                        'engraving' => $item['engraving'] ?? null,
                        'font' => $item['font'] ?? null,
                        'is_customized' => $item['customized'] ?? false,
                        'price' => $item['price'],
                        'quantity' => $item['quantity']
                    ]);
                }

                DB::commit();

                // Clear cart
                session()->forget('cart');

                return response()->json([
                    'success' => true,
                    'message' => 'Order placed successfully!',
                    'order_id' => $order->id
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create order: ' . $e->getMessage()
                ], 500);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function history()
    {
        $orders = Order::where('user_id', auth()->id())
            ->where('hidden_for_user', false)
            ->with(['items' => function ($query) {
                $query->where('hidden_for_user', false);
            }])
            ->latest()
            ->paginate(10);

        return view("User.history", compact('orders'));
    }
    public function clearAllHistory()
    {
        // Hide all orders for the authenticated user only
        Order::where('user_id', auth()->id())
            ->where('hidden_for_user', false)
            ->update(['hidden_for_user' => true]);

        // Hide all order items for the user's orders
        $orderIds = Order::where('user_id', auth()->id())
            ->where('hidden_for_user', false)
            ->pluck('id');

        OrderItem::whereIn('order_id', $orderIds)
            ->update(['hidden_for_user' => true]);

        return redirect()->back()->with('success', 'Order history cleared successfully.');
    }

    public function clearHistoryById($id)
    {
        // Only hide the order if it belongs to the authenticated user
        $order = Order::where('id', $id)
            ->where('user_id', auth()->id())
            ->where('hidden_for_user', false)
            ->firstOrFail();

        $order->update(['hidden_for_user' => true]);

        // Hide the associated order items
        OrderItem::where('order_id', $order->id)
            ->update(['hidden_for_user' => true]);

        return back()->with('success', 'Order removed from your history.');
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items');
        return view('User.show_order', compact('order'));
    }
    public function adminOrders(Request $request)
    {
        $query = Order::with(['user', 'items.tumbler'])->latest();

        // Search filter
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('username', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");
                })->orWhere('tracking_number', 'like', "%$search%");
            });
        }

        // Tumbler filter
        if ($request->has('tumbler')) {
            $query->whereHas('items', function ($q) use ($request) {
                $q->where('tumbler_id', $request->tumbler);
            });
        }

        // Status filter
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->paginate(5);
        $tumblers = Tumbler::all(); // For the tumbler filter dropdown

        return view('Admin.order', compact('orders','tumblers'));
    }
    public function order(Request $request)
    {
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        // Here you would typically save the order to the database
        // For now, we'll just clear the cart and show a success message
        session()->forget('cart');
        return redirect()->back()->with('success', 'Order placed successfully!');
    }
    public function cancel(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if (!in_array($order->status, ['pending', 'processing'])) {
            return back()->with('error', 'Order cannot be cancelled at this stage.');
        }

        $order->update(['status' => 'cancelled']);

        return back()->with('success', 'Order has been cancelled.');
    }

    public function markShipped(Order $order)
    {
        $order->update(['status' => 'shipped']);

        // Send notification to user
        $order->user->notify(new OrderShipped($order));

        return back()->with('success', 'Order marked as shipped.');
    }

    public function markDelivered(Order $order)
    {
        $order->update(['status' => 'delivered']);

        // Send notification to user
        $order->user->notify(new OrderDelivered($order));

        return back()->with('success', 'Order marked as delivered.');
    }
}
