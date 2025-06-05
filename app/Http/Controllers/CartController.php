<?php

namespace App\Http\Controllers;

use App\Models\Tumbler;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{

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
        return view('Pages.cart', ['users' => $users, '' => $cart]);
    }
    //remove tumbler from cart
    public function removeFromCart($key)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$key])) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found in cart'
            ], 404);
        }

        unset($cart[$key]);
        session()->put('cart', $cart);

        // Return JSON for AJAX
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart successfully!'
            ]);
        }

        // Fallback for normal requests
        return redirect()->back()->with('success', 'Item removed from cart successfully!');
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
}
