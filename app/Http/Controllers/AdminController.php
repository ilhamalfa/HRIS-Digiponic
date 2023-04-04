<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Perizinan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Cuti
    public function daftarCuti(){
        $cutis = Cuti::all();

        // dd($cutis);

        return view('admin.cuti-perizinan.daftar-cuti', [
            'cutis' => $cutis,
        ]);
    }

    public function konfirmasiCuti($id, $konfirmasi){
        $cuti = Cuti::find($id);
        $user = User::find($cuti->user_id);
        $jml_cuti = date_diff(date_create($cuti->tanggal_mulai), date_create($cuti->tanggal_berakhir))->days + 1;

        // dd($jml_cuti);

        if($konfirmasi == 'terima'){
            $cuti->update([
                'status_cuti' => 'Diterima'
            ]);

            $user->update([
                'jumlah_cuti' => $user->jumlah_cuti - $jml_cuti
            ]);
        }else{
            $cuti->update([
                'status_cuti' => 'Ditolak'
            ]);
        }

        return back()->with('success', 'Status Cuti Berhasil Dikonfirmasi!');
    }

    // Perizinan
    public function daftarIzin(){
        $izins = Perizinan::all();

        // dd($izins);

        return view('admin.cuti-perizinan.daftar-izin', [
            'izins' => $izins,
        ]);
    }

    public function buktiIzin($id){
        $data = Perizinan::find($id);
        
        return Storage::response($data->bukti_perizinan);
    }

    public function konfirmasiIzin($id, $konfirmasi){
        $izin = Perizinan::find($id);

        // dd($jml_izin);

        if($konfirmasi == 'terima'){
            $izin->update([
                'status_perizinan' => 'Diterima'
            ]);
        }else{
            $izin->update([
                'status_perizinan' => 'Ditolak'
            ]);
        }

        return back()->with('success', 'Status Perizinan Berhasil Dikonfirmasi!');
    }

}
