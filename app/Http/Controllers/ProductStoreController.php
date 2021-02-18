<?php

namespace App\Http\Controllers;

use App\ProductStore;
use App\Store;
use App\Product;
use DB;
use Illuminate\Http\Request;

class ProductStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Store $store)
    {
        $purchases = DB::table('product_store')
        ->join('products', 'products.id_product', '=', 'product_store.id_product')
        ->join('stores', 'stores.id_store', '=', 'product_store.id_store')
        ->where('stores.id_store', '=', $store->id_store) //('countries.id_country', '=', $id_country)
        ->orderby('products.product_name')
        ->get();

        /*$price_store = DB::table('product_store')
        ->join('products', 'products.id_product', '=', 'product_store.id_product')
        ->join('stores', 'stores.id_store', '=', 'product_store.id_store')
        ->where('stores.id_store', '=', $store->id_store) //('countries.id_country', '=', $id_country)
        ->select('price_store')
        ->get();*/
        //$price_store = $purchases->price_store;

        //dd($price_store);
        return view('stores.show', compact('store', 'purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store)
    {
        $products = Product::all();

        return view('stores.buy', compact('store', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Store $store)
    {
        $productStore = new ProductStore;

        $productStore->id_product = $request->id_product;
        $productStore->id_store = $store->id_store;
        $productStore->price_store = $request->price_store;

        $productStore->save();

    
        return back()->with('status','Comprado con éxito' );
    }
    public function edit(ProductStore $purchase, Store $store)
    {
        $products = Product::all();

        return view('stores.edit_product', compact('purchase', 'products', 'store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductStore  $productStore
     * @return \Illuminate\Http\Response
     */
    public function updateP(Request $request, ProductStore $purchase, Store $store)
    {
        $purchase->update($request->all());
        
        return back()->with('status', 'Actualizado producto con éxito', compact('purchase','store'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductStore  $productStore
     * @return \Illuminate\Http\Response
     */
    public function delete(ProductStore $purchase)
    {
        $purchase->delete();
        return back()->with('status', 'Eliminado ESTE producto con éxito');
    }
}
