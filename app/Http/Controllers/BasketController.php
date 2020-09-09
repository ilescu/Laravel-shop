<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }

        return view('basket', compact('order'));
    }

    public function basketConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);

        if ($success) {
            session()->flash('success',  'Your order created!');
        } else {
           session()->flash('warning', 'Error!');
        }

        return redirect()->route('index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function basketPlace()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));
    }

    /**
     * @param $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function basketAdd($productId)
    {
       $orderId = session('orderId');
       if (is_null($orderId)) {
           $order = Order::create();
           session(['orderId' => $order->id]);
       }else {
           $order = Order::find($orderId);
       }
       if ($order->products->contains($productId)) {
           $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
           $pivotRow->count++;
           $pivotRow->update();
       } else {
           $order->products()->attach($productId);
       }

       if (Auth::check()) {
           $order->user_id = Auth::id();
           $order->save();
       }

       $product = Product::find($productId);

       session()->flash('success', 'Added product: ' . $product->name);

       return redirect()->route('basket');
    }

    /**
     * @param $productId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }

        $order = Order::find($orderId);
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            }else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        $product = Product::find($productId);

        session()->flash('warning', 'Removed product:  ' . $product->name);

        return redirect()->route('basket');
    }
}
