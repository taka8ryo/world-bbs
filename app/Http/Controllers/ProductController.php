<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name', 'asc')->get();
        return view('product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }

    public function orders()
    {
        $orders = Order::all();
        return view('admin/orders', compact('orders'));
    }
}
