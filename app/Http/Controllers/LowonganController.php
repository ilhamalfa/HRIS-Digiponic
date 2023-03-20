<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function daftarLowongan(){
        $datas = Lowongan::all();
        
        return view('super-admin.lowongan.daftar-lowongan', [
            'datas' => $datas
        ]);
    }

    public function tambahLowongan(){
        return view('super-admin.lowongan.input-lowongan');
    }

    public function storeLowongan(Request $request){
        $validate = $request->validate([
            'posisi' => 'required',
            'tanggal' => 'required|after:yesterday',
            'kualifikasi' => 'required',
            'deskripsi' => 'required'
        ]);

        dd($validate);
    }
}
