<?php

namespace App\Http\Controllers;

use App\Models\Ongkir;
use App\Http\Requests\StoreOngkirRequest;
use App\Http\Requests\UpdateOngkirRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\CekOngkir;

class OngkirController extends Controller
{
    private $cekOngkir;  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->cekOngkir = CekOngkir::getInstance();  

        $provinces = collect($this->cekOngkir->getProvinsi()->rajaongkir->results);
        
        //ambil provinsi DI Yogyakarta
        $provinsiAsal = $provinces->filter(function($item){
            return $item->province_id == 5;
        })->values()[0];

        //ambil kota yang ada di jogjakarta
        $kotaAsal = $this->cekOngkir->getCity(5)->rajaongkir->results;  

        return view('cek_ongkir', compact('provinces', 'provinsiAsal', 'kotaAsal'));
    }

    public function getProvinsi()
    {

        $this->cekOngkir = CekOngkir::getInstance();  

        $data = $this->cekOngkir->getProvinsi();
        
        return response()->json($data->rajaongkir->results);
        
    }

    public function getProvinsiById()
    {
        
        $this->cekOngkir = CekOngkir::getInstance();  

        $data = $this->cekOngkir->getProvinsi(5);
        
        return response()->json($data->rajaongkir->results);
    }

    public function getCity(Request $request)
    {        

        $this->cekOngkir = CekOngkir::getInstance();  

        $data = $this->cekOngkir->getCity($request->provinsiId);
        
        return response()->json($data->rajaongkir->results);
    }


    public function cekBiaya(Request $request)
    {

       
        $valid =  Validator::make($request->all(), [
            "province_origin" => 'required',
            "city_origin" => 'required',
            "city_destination"=> 'required',
            "weight"=> 'required|numeric',
            "courier"=> 'required'
        ]);

        if ($valid->fails()) {
            $errors = $valid->errors()->toArray();
            return response()->json(['errors' => $errors], 422);
        }

        $this->cekOngkir = CekOngkir::getInstance();  

        $data = $this->cekOngkir->getBiaya($request->city_origin, $request->city_destination, $request->weight, $request->courier);
        
        return response()->json($data->rajaongkir->results);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOngkirRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOngkirRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function show(Ongkir $ongkir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function edit(Ongkir $ongkir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOngkirRequest  $request
     * @param  \App\Models\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOngkirRequest $request, Ongkir $ongkir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ongkir $ongkir)
    {
        //
    }
}
