<?php

namespace App\Http\Controllers;

use App\Models\Pegawai as Pegawai;
use App\Models\Province;
use App\Models\Resign;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\fileExists;

class SuperAdminController extends Controller
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

    public function inputUser(){
        return view('super-admin.pegawai.input-user-pegawai');
    }

    public function storeUser(Request $request){
        $validate = $request->validate([
            'email' => 'required|unique:users|email',
            'nik' => 'required|unique:users|min:10|max:10',
            'password' => 'required|min:8|confirmed'
        ]);

        $validate['role'] = 'Pegawai';
        $validate['jumlah_cuti'] = 14;
        $validate['password'] = Hash::make($request->password);

        // dd($request);
        
        User::create($validate);

        return redirect('home');
    }

    public function editPegawai($id){
        $data = User::find($id);
        $provinces = Province::all();

        return view('super-admin.pegawai.edit-data-pegawai', [
            'data' => $data,
            'provinces' => $provinces
        ]);
    }

    public function updatePegawai($id, Request $request){
        $data = Pegawai::where('user_id',$id)->first();

        // dd($request);

        if($request->has('foto')){
            $validate = $request->validate([
                'nama' => 'required',
                'tanggal_lahir' => 'required|before:17 years ago',
                'jenis_kelamin' => 'required',
                'nomor_hp' => 'required',
                'status_pernikahan' => 'required',
                'department' => 'required',
                'golongan' => 'required',
                'province_id' => 'required',
                'regency_id' => 'required',
                'district_id' =>'required',
                'village_id' => 'required',
                'alamat' => 'required',
                'foto' => 'required|image',
            ]);

            $validate['umur'] = Carbon::parse($request->tanggal_lahir)->age;

            if ($request->has('jumlah_anak')) {
                $validate['jumlah_anak'] = $request->jumlah_anak;
            }

            if(fileExists('storage/'. $data->foto)){
                unlink('storage/'. $data->foto);
            }

            $extension_foto = $request->file('foto')->extension();

            $nama_foto = $request->nama . '-' . now()->timestamp. '.' . $extension_foto;

            $validate['foto'] = $request->file('foto')->storeAs('Pegawai/foto', $nama_foto);
        }else{
            $validate = $request->validate([
                'nama' => 'required',
                'tanggal_lahir' => 'required|before:17 years ago',
                'jenis_kelamin' => 'required',
                'nomor_hp' => 'required',
                'status_pernikahan' => 'required',
                'department' => 'required',
                'golongan' => 'required',
                'province_id' => 'required',
                'regency_id' => 'required',
                'district_id' =>'required',
                'village_id' => 'required',
                'alamat' => 'required',
            ]);

            $validate['umur'] = Carbon::parse($request->tanggal_lahir)->age;

            if ($request->has('jumlah_anak')) {
                $validate['jumlah_anak'] = $request->jumlah_anak;
            }
        }

        $data->update($validate);

        return redirect('/data-pegawai');
    }

    public function resign(){
        $datas = Resign::all();

        return view('super-admin.resign.daftar-resign', [
            'datas' => $datas
        ]);
    }

    public function resignProses($id, $konfirmasi){
        $data = Resign::find($id);
        $user = User::find($data->user_id);

        // dd($jml_data);

        if($konfirmasi == 'terima'){
            $data->update([
                'status_resign' => 'Diterima'
            ]);

            $user->update([
                'role' => 'Resign'
            ]);
        }else{
            $data->update([
                'status_resign' => 'Ditolak'
            ]);
        }

        return back()->with('success', 'Status Resign Berhasil Dikonfirmasi!');
    }
}
