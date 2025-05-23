<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\ModelTumbler;
use App\Models\Tumbler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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
        return view('Admin/Dashboard',compact('users'));
    }
    public function Categories()
    {
        try {
            $Categories = Categories::all(); // Paginate categories (6 per page)
            $ModelTumbler = ModelTumbler::all();
            $tumblers = Tumbler::with(['category', 'model'])->paginate(4); // Paginate tumblers (8 per page)
            
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

        $Categories = Categories::paginate(6);

        return view('Pages.Home_Category', compact('tumblers', 'Categories', 'query'));
    }
    public function addToCart(Request $request, $id)
    {
        $tumbler = Tumbler::findOrFail($id);
        $cart = session()->get('cart', []);

        $quantity = (int) $request->input('quantity', 1);
        $color = $request->input('color', '');

        // Use a unique key for each color variation
        $cartKey = $id . '_' . $color;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $image = $tumbler->thumbnails;
            if (is_string($image)) {
                $decoded = json_decode($image, true);
                if (is_array($decoded)) {
                    $image = $decoded[0] ?? null;
                }
            }
            $cart[$cartKey] = [
                "name" => $tumbler->tumbler_name,
                "quantity" => $quantity,
                "price" => $tumbler->price,
                "image" => $image,
                "color" => $color,
            ];
        }

        session()->put('cart', $cart);

        if ($request->ajax()) {
            $cartCount = array_sum(array_column(session('cart', []), 'quantity'));
            return response()->json(['cartCount' => $cartCount]);
        }
        return redirect()->route('user.viewCart')->with('success', 'Tumbler added to cart successfully!');
    }
    public function cart()
    {
        return view('Pages.cart');
    }
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

        return view('Pages.category', compact('tumblers', 'Categories', 'ModelTumbler'));
    }
    public function filterByModel($modelId)
    {
        $tumblers = Tumbler::where('model_id', $modelId)->paginate(4);
        $Categories = Categories::all();
        $ModelTumbler = ModelTumbler::all();

        return view('Pages.Home_Category', compact('tumblers', 'Categories', 'ModelTumbler'));
    }
}
