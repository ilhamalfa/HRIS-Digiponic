<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Pegawai;
use App\Models\Pelamar;
use App\Models\User;
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

    public function detailPerLowongan($id){
        $data = Lowongan::findOrFail($id);
        return view('super-admin.lowongan.detail-lowongan', compact('data'));
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

    public function ubahStatus($id, $status){
        // dd([$id, $status]);
        $data = Lamaran::find($id);

        if($status == 'Menunggu'){
            $status = 'Wawancara';
        }else if($status == 'Wawancara'){
            $status = 'Psikotest';
        }else if($status == 'Psikotest'){
            $status = 'Offering';
        }else if($status == 'Offering'){
            $status = 'Diterima';
        }else{
            $status = 'Ditolak';
        }
        $data->update([
            'status' => $status
        ]);

        return redirect()->back();
    }

    public function terima($id, Request $request){
        $data = Lamaran::find($id);
        $user = User::find($data->user_id);

        $validate = $request->validate([
            'nik' => 'required',
            'department' => 'required',
            'golongan' => 'required'
        ]);

        // $s = $data->user->pelamar->foto;
        
        $foto = substr($data->user->pelamar->foto, strpos($data->user->pelamar->foto, "/") + 1);   

        // dd($foto);

        Storage::copy($data->user->pelamar->foto, 'Pegawai/' . $foto);

        $data->update([
            'status' => 'Diterima'
        ]);

        $user->update([
            'nik' => $validate['nik'],
            'role' => 'Pegawai'
        ]);

        Pegawai::create([
            'nama' => $data->user->pelamar->nama,
            'tanggal_lahir' => $data->user->pelamar->tanggal_lahir,
            'jenis_kelamin' => $data->user->pelamar->jenis_kelamin,
            'nomor_hp' => $data->user->pelamar->nomor_hp,
            'department' => $validate['department'],
            'golongan' => $validate['golongan'],
            'province_id' => $data->user->pelamar->province_id,
            'regency_id' => $data->user->pelamar->regency_id,
            'district_id' =>$data->user->pelamar->district_id,
            'village_id' => $data->user->pelamar->village_id,
            'alamat' => $data->user->pelamar->alamat,
            'umur' => $data->user->pelamar->umur,
            'user_id' => $data->user_id,
            'email' => $data->user->pelamar->email,
            'foto' => 'Pegawai/' . $foto,
            'jumlah_cuti' => 14
        ]);

        return redirect()->back();
    }
}
