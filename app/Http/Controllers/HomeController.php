<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Cart;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homepage()
    {
        $productChunk = Product::all()->chunk(4);
        return view('homepage', compact('productChunk'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productDetail(Product $product)
    {
        $products = Product::limit(3)->where('id', '!=', $product->id)->get();
        return view('product-detail', compact('product', 'products'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart()
    {
        $carts = Cart::all();
        return view('cart', compact('carts'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addToCart(Request $req, Cart $cart)
    {
        $input = $req->all();
        $product = Product::find($input['product_id']);
        if ($product) {
            $alreadyInCart = $cart->where('product_id', $input['product_id'])->first();
            if ($alreadyInCart) $cart = $alreadyInCart;
            $cart->product_id   = $input['product_id'];
            $cart->qty          = $input['qty'];
            $cart->price        = $product->price;

            $disc = Discount::findByCode($input['discount_code']);

            if (!is_null($input['discount_code'])) {
                if ($disc && $input['discount_code']) {
                    $cart->discount    = ($product->price / 100) * $disc->discount_percentage;
                    $cart->price        = $product->price - $cart->discount;
                } else {
                    $errorMessage = 'Discount not found or no longer available!';
                    return redirect()->back();
                }
            }

            if ($cart->save()) {
                return redirect('cart');
            }
        } else {
            $errorMessage = 'Failed add to cart, Because that product is no longer available!';
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateCart(Request $req, Cart $cart)
    {
        $input = $req->all();
        
        foreach ($input['items'] as $id => $item) {
            $cart->find($id)->update(['qty' => $item['qty']]);
        }
        
        $cart->whereNotIn('id', array_keys($input['items']))->delete();
        return redirect(route('homepage'));
    }
}
