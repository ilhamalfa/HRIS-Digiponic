<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerizinanController extends Controller
{
    public function daftarPerizinan(){
        $cutis = Cuti::where('pegawai_id', Auth::user()->pegawai->id)->get();
        $izins = Perizinan::where('pegawai_id', Auth::user()->pegawai->id)->get();

        return view('pegawai.cuti-perizinan.daftar-cuti', [
            'cutis' => $cutis,
            'izins' => $izins
        ]);
        // dd($datas);
    }
}
