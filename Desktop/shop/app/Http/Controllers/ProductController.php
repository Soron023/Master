<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post;
use App\Models\Order;
use App\Models\OrderItem;
  
class ProductController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));

        // $posts = Post::all();
    	// return view('post')->with('posts', $posts);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('cart');
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_id"=>$product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }



    //check out function:

    public function checkout()
    {
        $cart = session()->get('cart');

        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
        $order = new Order();
        //$order->user_id = Auth::user()->id;
        $order->user_id = 2;
        $order->amount = $totalAmount;
        $order->save();
        foreach ($cart as $item) {

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->amount = $item['price'];
            $orderItem->save();
        }
        session()->put('cart', []);
        return redirect()->back()->with('success', 'Checkout successfully!');
    }


    //check out function:


}
