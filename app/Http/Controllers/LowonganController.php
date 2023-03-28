<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function detailLowongan($id){
        $data = Lowongan::find($id);
        $datas = Lamaran::where('lowongan_id', $id)->get();

        // dd($datas);
        
        return view('super-admin.lowongan.daftar-pelamar', [
            'data' => $data,
            'datas' => $datas
        ]);
    }

    public function detailPelamar($id){
        $data = Lamaran::find($id);

        // dd($data);
        
        return view('super-admin.lowongan.detail-pelamar', [
            'data' => $data,
        ]);
    }

    public function downloadCV($id){
        $data = Pelamar::find($id);

        $cv = $data->cv_file;
        
        return Storage::response($cv);
    }

    public function storeLowongan(Request $request){
        $validate = $request->validate([
            'posisi' => 'required',
            'tanggal' => 'required|after:yesterday',
            'kualifikasi' => 'required',
            'deskripsi' => 'required'
        ]);

        // dd($validate);
        Lowongan::create($validate);

        return redirect('data-lowongan');
    }
}
