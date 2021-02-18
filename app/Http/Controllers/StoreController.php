<?php

namespace App\Http\Controllers;

use App\Store;
use App\City;
use App\Product;
use DB;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = DB::table('stores')
        ->join('cities', 'cities.id_city', '=', 'stores.id_city')
        ->orderby('store_name')
        ->get();

        return view('stores.index',[
            'stores' => $stores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return view('stores.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Store::create([
            'store_name' => $request->store_name,
            'id_city' => $request->id_city
        ]);
        return back()->with('status','Creado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
   /* public function show(Store $store)
    {
        $purchases = DB::table('product_store')
        ->join('products', 'products.id_product', '=', 'product_store.id_product')
        ->join('stores', 'stores.id_store', '=', 'product_store.id_store')
        ->where('stores.id_store', '=', $store->id_store) //('countries.id_country', '=', $id_country)
        ->orderby('products.product_name')
        ->get();

        dd($purchases);

        return view('stores.show', compact('store', 'purchases'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $cities = City::all();

        return view('stores.edit', compact('store', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $store->update($request->all());

        return back()->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        if($store->products->count()){
            return back()->withErrors(['errors' => 'No se puede eliminar, tiene productos']);
        }

        $store->delete();

        return back()->with('status', 'Eliminado con éxito');
    }
}
