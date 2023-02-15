<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZipCode;
use App\Http\Resources\ZipCodesCollection;
use Illuminate\Support\Facades\Cache;


class ZipCodeController extends Controller
{
    public function index($zipCode){
        //validate an integer data
        if ((!(int)$zipCode) || (is_null($zipCode))){
            return response()->json([
                'status' => false,
                'message' => 'Only numeric data is available.'
            ], 404);
        }

        //Creating the JSON object
        try{
            $zipcodes = Zipcode::query()->where('d_codigo', $zipCode)->get();
            $data = cache()->remember('zipcodes.{$zipCode}', now()->addDays(1), function() use ($zipcodes){
                return new ZipCodesCollection($zipcodes);
            });

            return $data;
        }catch(\ErrorException $error){
            return response()->json([
                'status' => false,
                'message' => 'Not data found or invalid zip code..'
            ], 404);
        }

    }
}
