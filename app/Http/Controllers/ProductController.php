<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Provider;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
        ->join('categories', 'categories.id_category', '=', 'products.id_category')
        ->join('providers', 'providers.id_provider', '=', 'products.id_provider')
        ->orderby('product_name')
        ->get();

        return view('products.index',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $providers = Provider::all();

        return view('products.create', compact('categories', 'providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;

        $product->product_name = $request->product_name;
        $product->provider_price = $request->provider_price;
        $product->id_category = $request->id_category;
        $product->id_provider = $request->id_provider;

        $product->save();

        //return $this->index();
        return back()->with('status', 'Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $providers = Provider::all();

        return view('products.edit', compact('product', 'categories', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return back()->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->stores->count()){
            return back()->withErrors(['errors' => 'No se puede eliminar, esta en tiendas']);
        }

        $product->delete();

        return back()->with('status', 'Eliminado con éxito');
    }
}
