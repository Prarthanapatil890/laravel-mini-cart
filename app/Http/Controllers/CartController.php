<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private $products = [
          1 => ['id' => 1, 'name' => 'Samsung Galaxy S23', 'price' => 74999],
    2 => ['id' => 2, 'name' => 'iPhone 14 Pro', 'price' => 129999],
    3 => ['id' => 3, 'name' => 'OnePlus 12R', 'price' => 45999],

    ];

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('products', ['products' => $this->products, 'cart' => $cart]);
    }

    public function addToCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = $this->products[$id];
            $cart[$id]['quantity'] = 1;
        }
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function increaseQty($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function decreaseQty($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id]) && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        } elseif (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back();
    }

    public function checkout()
    {
        session()->forget('cart');
        return view('checkout');
    }
}
