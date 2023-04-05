<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Cuti;
use App\Models\Pegawai;
use App\Models\Pelamar;
use App\Models\Perizinan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dataPegawai(){
        $datas = User::has('pegawai')->where('role', '!=', 'Pelamar')->get();

        return view('super-admin.pegawai.daftar-data-pegawai', [
            'datas' => $datas
        ]);
    }

    public function dataUser(){
        $datas = User::where('role', '!=', 'Pelamar')->get();

        return view('super-admin.pegawai.data-user', [
            'datas' => $datas
        ]);
    }
    
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

    // Lowongan
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

    public function CV($id){
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
