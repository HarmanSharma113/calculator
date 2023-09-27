<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{

    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $length = $request->input('length');
        $width = $request->input('width');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $weightUnit = $request->input('weightUnit');


        if ($weightUnit === 'lbs') {
            $weight *= 0.453592;
        }


        $volumetricWeight = ($length * $width * $height) / 5000;

        return response()->json(['volumetricWeight' => $volumetricWeight, 'convertedWeight' => $weight]);
    }
}
// dummy calculation below 
// Air Freight Chargeable Weight formula:
//     Metric: L x W x H in centimetres (cm.) / 6,000 = vw (in kgs)
// 1kg to lbs
// 2.20462
// Volumetric weight of a parcel is calculated as follows:
// 120cm x 55cm x 50cm
// 5,000
// = 66 kg vol.weight
