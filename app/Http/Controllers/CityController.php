<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use DB;
use Illuminate\Http\Request;

class CityController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cities = City::join('countries', 'countries.id_country', '=', 'cities.id_country')
        ->orderby('city_name')
        ->get();

        //dd($cities);

        return view('cities.index',[
            'cities' => $cities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        //$countries->allCountries();
        return view('cities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        City::create([
            'city_name' => $request->city_name,
            'id_country' => $request->id_country
        ]);
        
        //return $this->index();
        return back()->with('status', 'Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        /*$id_country =$city->id_country;
        $country_name = DB::table('countries')
            ->select('country_name')
            ->where('countries.id_country', '=', $id_country)
            ->get();
        */
        
        $countries = Country::all();
        return view('cities.edit', compact('city', 'countries'));//, 'country_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $city->update($request->all());

        //return $this->index();
        return back()->with('status', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {

        if($city->providers->count()){
            return back()->withErrors(['errors' => 'No se puede eliminar, tiene proveedores asignados']);
        }

        if($city->stores->count()){
            return back()->withErrors(['errors' => 'No se puede eliminar, tiene tiendas asignadas']);
        }

        $city->delete();

        return back()->with('status', 'Eliminado con éxito');
    }
}
