<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function Addcart(Request $request)
    {
        $productId = $request->input('id');
        $product = Product::findOrFail($productId);

        // Check if the product is already in the cart
        $cartItem = Cart::content()->where('id', $product->id)->first();
        if ($cartItem) {
            return response()->json(['status' => 'error', 'message' => 'This product is already added to your cart!']);
        }

        // Add the product to the cart
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->input('qtybutton', 1), // Default quantity 1 if not provided
            'price' => $product->price, // Adjust as needed
            'options' => ['image' => $product->image_path]
        ]);



        return response()->json(['status' => 'success', 'message' => 'Product added to cart successfully!',]);
    }


    public function showCart(Request $request)
    {
        if ($request->ajax()) {
            // For AJAX requests, return JSON response
            $cartContents = Cart::content();
            $subtotal = Cart::subtotal();
            $taxRate = 2; // Adjust as needed
            foreach (Cart::content() as $item) {
                Cart::setTax($item->rowId, $taxRate);
            }
            $tax = Cart::tax();

            return response()->json([
                'cartContents' => $cartContents,
                'subtotal' => $subtotal,
                'tax' => $tax,
            ]);
        } else {
            // For normal requests, return view with cart contents
            $cartContents = Cart::content();
            $subtotal = Cart::subtotal();
            $taxRate = 2; // Adjust as needed
            foreach (Cart::content() as $item) {
                Cart::setTax($item->rowId, $taxRate);
            }
            $tax = Cart::tax();

            return view('frontend.cart.cart_view', compact('cartContents', 'subtotal', 'tax'));
        }
    }

// cart update
    public function updateCart(Request $request, $rowId)
    {
        if ($request->ajax()) {
            $qty = $request->input('qtybutton');
            Cart::update($rowId, $qty);

            return response()->json(['status' => 'success', 'message' => 'Cart updated successfully!']);
        }
    }

// cart remove

    public function removeCart($rowId)
    {
        if (request()->ajax()) {
            Cart::remove($rowId);

            return response()->json(['status' => 'success', 'message' => 'Item removed from cart successfully!']);
        }
    }


public function CheckOut(){

    $cartContents = Cart::content();

    $subtotal = (float) str_replace(',', '', Cart::subtotal());

    $taxRate = 2;
    foreach (Cart::content() as $item) {
        Cart::setTax($item->rowId, $taxRate);
    }

    $tax = (float) str_replace(',', '', Cart::tax());

    $initialShippingCost = 0.0; // Set the initial shipping cost to 0
    $total = $subtotal + $tax + $initialShippingCost;

         return view('frontend.cart.check_out',[
             'cartContents'=> $cartContents,
             'subtotal'=> $subtotal,
             'tax'=>$tax,
             'total'=>$total,
         ]);
}


    // Cart::update($rowId, ['name' => 'Product 1']); // Will update the name



}


