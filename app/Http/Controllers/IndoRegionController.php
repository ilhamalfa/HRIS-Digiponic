<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class IndoRegionController extends Controller
{
    public function getKabupaten(Request $request){
        $id_provinsi = $request->id_provinsi;

        $datas = Regency::where('province_id', $id_provinsi)->get();
        
        foreach($datas as $data){
            echo "<option value='$data->id'>$data->name</option>";
        }
    }

    public function getKecamatan(Request $request){
        $id_kabupaten = $request->id_kabupaten;

        $datas = District::where('regency_id', $id_kabupaten)->get();
        
        foreach($datas as $data){
            echo "<option value='$data->id'>$data->name</option>";
        }
    }

    public function getKelurahan(Request $request){
        $id_kecamatan = $request->id_kecamatan;

        $datas = Village::where('district_id', $id_kecamatan)->get();
        
        foreach($datas as $data){
            echo "<option value='$data->id'>$data->name</option>";
        }
    }
}
