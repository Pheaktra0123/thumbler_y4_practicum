<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Tumbler;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MonthlySalesExport;

class  AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function customer()
    {
        $users = User::where('type', 'user')->paginate(5);

        // Debug output
        foreach ($users as $user) {
            \Log::info("User {$user->id} online status: " . ($user->isOnline() ? 'Online' : 'Offline'));
        }

        return view('Admin/Auth', compact('users'));
    }
    public function editRole($id){
        $users=User::find($id);
        if (!$users) {
            return redirect()->back()->with('error', 'User not found');
        }
        $users->type = $users->type == 0 ? 1 : 0; // Toggle between 0 and 1
        $users->save();
        return view('Admin/Auth',compact('users'));
    }
    public function updateRole(Request $request, User $user)
{
    $validated = $request->validate([
        'type' => 'required|integer|in:0,1',
    ]);

    $user->update($validated);

    return back()->with('success', 'User role updated successfully');
}

    public function adminHome()
    {
        $users = User::all();
        $tumblers = Tumbler::get();
        $orders = \App\Models\Order::all(); // Get all orders
        $orderCount = $orders->count();     // Count orders

        return view('Admin.Dashboard', compact('users', 'tumblers', 'orderCount'));
    }
    public function ListRole(Request $request)
    {
        $query = User::query();

        // Check if a search query is provided
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('username', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('type', 'like', "%$search%");
        }

        $users = $query->paginate(6); // Paginate the results
        return view('Admin/List_roles', compact('users'));
    }
    public function confirmOrder($orderId)
    {
        $order = \App\Models\Order::findOrFail($orderId);
        $order->status = 'completed';
        $order->save();
        return redirect()->back()->with('success', 'Order confirmed!');
    }
    public function show(Order $order)
    {
        $order->load(['user', 'items']);
        return view('Admin.detail_order', compact('order'));
    }

   
}
