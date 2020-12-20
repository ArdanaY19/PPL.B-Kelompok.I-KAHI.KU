<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\City;
use App\Province;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class getApi extends Controller
{
    public function ongkir(Request $request){

        if($request->origin && $request->destination && $request->weight && $request->courier){
            $origin = $request->origin;
            $destination = $request->destination;
            $weight = $request->weight;
            $courier = $request->courier;

            $response = Http::asForm()->withHeaders([
                'key' => '09a0405b6c05416fd21f9dd03844598b'
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier
            ]);
    
            $cekongkir = $response['rajaongkir']['results'][0]['costs'];
        }else{
            $origin = '';
            $destination = '';
            $weight = '';
            $courier = '';
            $cekongkir = null;
        }
        
        $provinsi = Province::all();
        return view('ongkir', compact('provinsi', 'cekongkir'));
    }

    public function ajax($id){
        $cities = City::where('province_id','=', $id)->pluck('city_name','id');       

        return json_encode($cities);
    }

    // public function getOngkir(Request $request)
    // {
    //     $origin = $request->origin;
    //     $destination = $request->destination;
    //     $weight = $request->weight;
    //     $courier = $request->courier;

    //     $cost = RajaOngkir::ongkosKirim([
    //         'origin' => $origin,
    //         'destination' => $destination,
    //         'weight' => $weight,
    //         'courier' => $courier,
    //     ])->get();

    //     dd($cost);
    // }
}
