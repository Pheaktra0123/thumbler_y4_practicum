<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\ModelTumbler;
use App\Models\Tumbler;
use App\Models\CustomizedTumbler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','Categories','model','search');
    }

    public function index()
    {
       
        return view('Pages.home');
    }
    public function dashboard()
    {
        return view('User/user_dashboard');
    }
    public function userEdit(){
        return view('User/Profile_Edit');
    }

    public function adminHome()
    {
        $users=User::all();
        $tumblers = Tumbler::get();
        $orders = Order::all(); // Get all orders
        $orderCount = $orders->count();     // Count orders
        return view('Admin/Dashboard',compact('users','tumblers','orderCount'));
    }
    public function Categories()
    {
        try {
            $Categories = Categories::all(); // Get all categories
            $ModelTumbler = ModelTumbler::all();
            // Eager load reviews to avoid N+1 queries
            $tumblers = Tumbler::with(['reviews', 'category', 'model'])->paginate(4);

            foreach ($tumblers as $tumbler) {
                $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
                $tumbler->rating_count = $tumbler->reviews->count();
            }

            return view('Pages.Home_Category', compact('Categories', 'ModelTumbler', 'tumblers'));
        } catch (\Exception $e) {
            Log::error('Error fetching data: ' . $e->getMessage());
            return view('Pages.Home_Category', [
                'Categories' => collect([]),
                'ModelTumbler' => collect([]),
                'tumblers' => collect([])
            ]);
        }
    }
    public function model()
    {
        $model=ModelTumbler::all();
        return view('Pages.Home_Model_Tumbler',compact('model'));
    }

    //search function to search tumbler in catetory and model
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search tumblers
        $tumblers = Tumbler::with(['category', 'model'])
            ->where('tumbler_name', 'LIKE', "%{$query}%")
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('model', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->paginate(4); // Paginate the results
        // Eager load reviews to avoid N+1 queries
        foreach ($tumblers as $tumbler) {
            $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
            $tumbler->rating_count = $tumbler->reviews->count();
        }
        $Categories = Categories::paginate(6);

        return view('Pages.Home_Category', compact('tumblers', 'Categories', 'query'));
    }
    //add tumbler to cart
public function addToCart(Request $request, $id)
{
    try {
        $tumbler = Tumbler::findOrFail($id);
        $cart = session()->get('cart', []);

        $quantity = (int) $request->input('quantity', 1);
        $color = $request->input('color', '');
        $engraving = $request->input('engraving', '');
        $font = $request->input('font', '');
        $imagePath = null;

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:1024'
            ]);
            $imagePath = $request->file('image')->store('custom_tumblers', 'public');
        } else {
            // Use default tumbler image if no custom image uploaded
            $thumbs = is_array($tumbler->thumbnails) ? $tumbler->thumbnails : json_decode($tumbler->thumbnails, true);
            $imagePath = $thumbs[0] ?? 'black-nobg.png';
        }

        // Only add $10 if engraving or custom image is present
        $customPrice = $tumbler->price;
        if (!empty($engraving) || ($request->hasFile('image') && $imagePath)) {
            $customPrice += 10;
        }

        // Check if this is a customized product
        $isCustomized = !empty($engraving) || ($request->hasFile('image') && $imagePath) || !empty($font);

        // For non-customized products, we'll use a simpler key
        if (!$isCustomized) {
            $cartKey = 'product_' . $id;
            if (isset($cart[$cartKey])) {
                // If product exists and is not customized, just increase quantity
                $cart[$cartKey]['quantity'] += $quantity;
            } else {
                // Add new non-customized product
                $cart[$cartKey] = [
                    "name" => $tumbler->tumbler_name,
                    "quantity" => $quantity,
                    "price" => $customPrice,
                    "image" => $imagePath,
                    "color" => $color,
                    "engraving" => $engraving,
                    "font" => $font,
                    "customized" => false,
                ];
            }
        } else {
            // For customized products, create a unique key
            $imageFlag = $request->hasFile('image') ? 'img' : '';
            $engravingFlag = !empty($engraving) ? substr(md5($engraving), 0, 8) : '';
            $fontFlag = !empty($font) ? substr(md5($font), 0, 8) : '';
            
            $cartKey = implode('_', ['custom', $id, $color, $engravingFlag, $fontFlag, $imageFlag]);

            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity'] += $quantity;
            } else {
                $cart[$cartKey] = [
                    "name" => $tumbler->tumbler_name,
                    "quantity" => $quantity,
                    "price" => $customPrice,
                    "image" => $imagePath,
                    "color" => $color,
                    "engraving" => $engraving,
                    "font" => $font,
                    "customized" => true,
                ];
            }
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Added to cart successfully',
            'cartCount' => array_sum(array_column(session('cart', []), 'quantity'))
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}
    //view cart
    // This function retrieves the cart from the session and returns a view to display it
    public function cart()
    {
        $users = User::all();
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        return view('Pages.cart');
    }
    //remove tumbler from cart
    public function removeFromCart($key)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Tumbler removed from cart successfully!');
    }
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }
    public function checkout()
    {
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        return view('Pages.checkout', compact('cart'));
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
    public function updateCartQuantity(Request $request, $key)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$key])) {
            if ($request->input('action') === 'increase') {
                $cart[$key]['quantity'] += 1;
            } elseif ($request->input('action') === 'decrease' && $cart[$key]['quantity'] > 1) {
                $cart[$key]['quantity'] -= 1;
            }
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }
    public function filterByCategory($categoryId)
    {
        $tumblers = Tumbler::where('category_id', $categoryId)->paginate(4);
        $Categories = Categories::all();
        $ModelTumbler = ModelTumbler::all();
        // Eager load reviews to avoid N+1 queries
        foreach ($tumblers as $tumbler) {
            $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
            $tumbler->rating_count = $tumbler->reviews->count();
        }
        // Return the view with the tumblers, categories, and model tumbler data
        if ($tumblers->isEmpty()) {
            return redirect()->back()->with('error', 'No tumblers found for this category.');
        }
        // Return the view with the filtered tumblers

        return view('Pages.category', compact('tumblers', 'Categories', 'ModelTumbler'));
    }
    // Filter tumblers by model
    public function filterByModel($modelId)
    {
        $query = request()->input('query');
        $tumblers = Tumbler::where('model_id', $modelId)
            ->when($query, function($q) use ($query) {
                $q->where('tumbler_name', 'LIKE', "%{$query}%");
            })
            ->with(['reviews', 'category', 'model'])
            ->paginate(8);

        // ... set rating/rating_count if needed ...

        foreach ($tumblers as $tumbler) {
            $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
            $tumbler->rating_count = $tumbler->reviews->count();
        }
        $model = ModelTumbler::findOrFail($modelId);
        return view('Pages.model', compact('tumblers', 'model'));
    }
    // Filter tumblers in a specific category with search functionality
    public function filterInCategory( $categoryId)
    {
         $query = request()->input('query');
        $tumblers = Tumbler::where('category_id', $categoryId)
            ->when($query, function($q) use ($query) {
                $q->where('tumbler_name', 'LIKE', "%{$query}%");
            })
            ->with(['reviews', 'category', 'model'])
            ->paginate(8);

        // ... set rating/rating_count if needed ...

        foreach ($tumblers as $tumbler) {
            $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
            $tumbler->rating_count = $tumbler->reviews->count();
        }
        $category =ModelTumbler::findOrFail($categoryId);
        return view('Pages.category', compact('tumblers', 'category', 'query'));
    }
    // Display tumblers on the home page with categories
    public function homeCategory()
    {
        $Categories = Categories::all();
        // Eager load reviews to avoid N+1 queries
        $tumblers = Tumbler::with('reviews', 'category', 'model')->paginate(8);

        foreach ($tumblers as $tumbler) {
            $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
            $tumbler->rating_count = $tumbler->reviews->count();
        }

        return view('Pages.Home_Category', compact('Categories', 'tumblers'));
    }
    // Search for models in the tumbler model page
    public function searchModel(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $model = ModelTumbler::where('name', 'LIKE', "%{$query}%")->paginate(4);
        } else {
            $model = ModelTumbler::paginate(4);
        }
        return view('Pages.Home_Model_Tumbler', compact('model', 'query'));
    }
    public function customizeTumbler($id)
    {
        $tumbler = \App\Models\Tumbler::findOrFail($id);
        return view('Pages.customize_tumbler', compact('tumbler'));
    }
    
    public function saveCustomizedTumbler(Request $request, $id)
    {
        $request->validate([
            'engraving' => 'nullable|string|max:6',
            'font' => 'nullable|string',
            'color' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|image|max:1024', // 1MB max
        ]);

        $tumbler = \App\Models\Tumbler::findOrFail($id);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('custom_tumblers', 'public');
        }

        // Save to customized_tumblers table
        $custom = new \App\Models\CustomizedTumbler();
        $custom->user_id = auth()->id();
        $custom->tumbler_id = $tumbler->id;
        $custom->engraving = $request->engraving;
        $custom->font = $request->font;
        $custom->color = $request->color;
        $custom->quantity = $request->quantity;
        $custom->image = $imagePath;
        $custom->save();

        return redirect()->route('customized.tumblers')->with('success', 'Customization saved!');
    }
    public function customizedTumblers()
    {
        $customized =CustomizedTumbler::where('user_id', auth()->id())->get();
        return view('Pages.customized_tumblers', compact('customized'));
    }
    public function deleteCustomizedTumbler($id)
    {
        $custom = CustomizedTumbler::where('user_id', auth()->id())
            ->where('id', $id)
            ->first();

        if ($custom) {
            $custom->delete();
        }

        return redirect()->route('customized.tumblers')->with('success', 'Customization deleted!');
    }
    public function customizedTumblerDetails($id)
    {
        $custom = \App\Models\CustomizedTumbler::where('user_id', auth()->id())
        ->where('id', $id)
        ->first();

        if (!$custom) {
            return redirect()->route('customized.tumblers')->with('error', 'Customization not found.');
        }

        $tumbler = \App\Models\Tumbler::find($custom->tumbler_id);

        return view('Pages.customized_detail', compact('custom', 'tumbler'));
    }
    public function submitOrder(Request $request)
    {
        $request->validate([
            'addresses' => 'required|array|min:1',
            'addresses.*' => 'required|string',
            'payment' => 'required|string',
            'phone' => 'nullable|string',
            'username' => 'nullable|string',
            'coords' => 'nullable|string',
            // Add validation for bank slip if needed
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Cart is empty.'], 400);
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
                'status' => 'pending',
            ]);

            // Optionally, save order items in a pivot table or another table
            // foreach ($cart as $item) {
            //     $order->items()->create([...]);
            // }

            // Save address, payment, etc. as needed (add columns or a related table)

            session()->forget('cart');
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Order placed successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Order failed.'], 500);
        }
    }
}
