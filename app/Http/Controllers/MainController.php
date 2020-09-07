<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::get();
        return view('index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    /**
     * @param $code
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    /**
     * @param $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product($category, $product = null)
    {
        return view('product', ['product' => $product]);
    }

    public function test()
    {
        //
    }

}
