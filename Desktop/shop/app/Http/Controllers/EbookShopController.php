<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;
use App\Models\Category;

class EbookShopController extends Controller
{
     /**
     * Write code on Method
     *
     * @return response()
     */
    
    public function index()
    {
        $categories = Category::all();
        $products = Ebook::all();
        return view('ebookshop.product', compact('products'));
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function ebookCart()
    {
        return view('ebookshop.cart');
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ebookAddToCart($id)
    {
        $product = Ebook::findOrFail($id);
          
        $ebookcart = session()->get('ebookcart', []);
  
        if(isset($ebookcart[$id])) {
            $ebookcart[$id]['quantity']++;
        } else {
            $ebookcart[$id] = [
                "product_id"=>$product->id,
                "name" => $product->short_desc,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
            ];
        }
          
        session()->put('ebookcart', $ebookcart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ebookUpdate(Request $request)
    {
        if($request->id && $request->quantity){
            $ebookcart = session()->get('ebookcart');
            $ebookcart[$request->id]["quantity"] = $request->quantity;
            session()->put('ebookcart', $ebookcart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ebookRemove(Request $request)
    {
        if($request->id) {
            $ebookcart = session()->get('ebookcart');
            if(isset($ebookcart[$request->id])) {
                unset($ebookcart[$request->id]);
                session()->put('ebookcart', $ebookcart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }



    //check out function:

    public function ebookCheckout()
    {
        $ebookcart = session()->get('ebookcart');

        $totalAmount = 0;
        foreach ($ebookcart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
        $order = new Order();
        //$order->user_id = Auth::user()->id;
        $order->user_id = 2;
        $order->amount = $totalAmount;
        $order->save();
        foreach ($ebookcart as $item) {

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->amount = $item['price'];
            $orderItem->save();
        }
        session()->put('ebookcart', []);
        return redirect()->back()->with('success', 'Checkout successfully!');
    }


    //check out function:
}
