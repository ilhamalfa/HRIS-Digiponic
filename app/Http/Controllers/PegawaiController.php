<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\District;
use App\Models\Pegawai;
use App\Models\Perizinan;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Resign;
use App\Models\User;
use App\Models\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;
use function PHPUnit\Framework\isEmpty;

class PegawaiController extends Controller
{
    // Tambah Data Pegawai
    public function inputPegawai(){
        $data = Pegawai::where('user_id', Auth::user()->id)->first();

        if(!isset($data)){
            $provinces = Province::all();

            return view('pegawai.data-pegawai.input-data-pegawai', [
                'provinces' => $provinces
            ]);
        }else{
            return redirect('home');
        }
    }

    public function editUser(){
            return view('pegawai.data-pegawai.update-profile');
    }

    public function updateUser(Request $request){
        $data = User::find(Auth::user()->id);

        if($request->email == $data->email){
            $validate = $request->validate([
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $validate['password'] = Hash::make($request->password);

            $data->update($validate);
        }else{
            $validate = $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $validate['password'] = Hash::make($request->password);
            $validate['email_verified_at'] = NULL;

            $data->update($validate);

            $data->sendEmailVerificationNotification();
        }

        return redirect()->back();
    }

    public function editPegawai(){
        $data = Pegawai::where('user_id', Auth::user()->id)->first();

        $provinces = Province::all();
        $regency = Regency::find($data->regency_id);
        $district = District::find($data->district_id);
        $village = Village::find($data->village_id);

        // dd($districts);

        return view('pegawai.data-pegawai.update-data-pegawai', [
            'data' => $data,
            'provinces' => $provinces,
            'regency' => $regency,
            'district' => $district,
            'village' => $village
        ]);
    }

    public function updatePegawai(Request $request){
        $data = Pegawai::find(Auth::user()->pegawai->id);
        // dd($data);

        if(!$request->has('foto')){
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

            if($request->has('jumlah_anak')){
                $validate['jumlah_anak'] = $request->jumlah_anak;
            }else{
                $validate['jumlah_anak'] = 0;
            }

            // dd($validate);
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
                'foto' => 'required|image',
            ]);
    
            $validate['umur'] = Carbon::parse($request->tanggal_lahir)->age;

            if($request->has('jumlah_anak')){
                $validate['jumlah_anak'] = $request->jumlah_anak;
            }else{
                $validate['jumlah_anak'] = 0;
            }

            if(fileExists('storage/'. $data->foto)){
                unlink('storage/'. $data->foto);
            }

            $extension_foto = $request->file('foto')->extension();
                
            $nama_foto = $request->nama . '-' . now()->timestamp. '.' . $extension_foto;
    
            $validate['foto'] = $request->file('foto')->storeAs('Pegawai/foto', $nama_foto);
        }

        $data->update($validate);

        return redirect()->back();
    }

    public function storePegawai(Request $request){
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

        $validate['email'] = auth()->user()->email;

        $validate['user_id'] = auth()->user()->id;

        if($request->has('jumlah_anak')){
            $validate['jumlah_anak'] = $request->jumlah_anak;
        }else{
            $validate['jumlah_anak'] = 0;
        }

        $validate['jumlah_cuti'] = 14;

        // dd($validate);

        $extension_foto = $request->file('foto')->extension();
            
        $nama_foto = $request->nama . '-' . now()->timestamp. '.' . $extension_foto;

        $validate['foto'] = $request->file('foto')->storeAs('Pegawai/foto', $nama_foto);
        
        Pegawai::create($validate);

        return redirect('home');
        // dd($validate);
    }

    // Cuti
    public function daftarCuti(){
        $cutis = Cuti::where('user_id', Auth::user()->id)->get();

        return view('pegawai.cuti-perizinan.daftar-cuti', [
            'cutis' => $cutis,
        ]);
        // dd($datas);
    }

    public function ajukanCuti(){
        return view('pegawai.cuti-perizinan.ajukan-cuti');
        // dd($datas);
    }

    public function prosesCuti(Request $request){
        // dd($request);
        $date = date('d-m-Y', strtotime('+3 days'));
        
        // dd($request);
        if(isset($request->check)){
            $validate = $request->validate([
                'tanggal_mulai' => 'required|after_or_equal:' . $date,
                'tanggal_berakhir' => 'required|after_or_equal:tanggal_mulai'
            ]);
        }else{
            $validate = $request->validate([
                'tanggal_mulai' => 'required|after_or_equal:' . $date,
            ]);

            $validate['tanggal_berakhir'] = $validate['tanggal_mulai'];
        }

        $jml_cuti = date_diff(date_create($validate['tanggal_mulai']), date_create($validate['tanggal_berakhir']))->days + 1;
        // dd($jml_cuti);

        if($jml_cuti <= Auth::user()->jumlah_cuti){
            $validate['status_cuti'] = "Menunggu Persetujuan";
            $validate['user_id'] = Auth::user()->id;

            Cuti::create($validate);

            return redirect('pegawai/cuti')->with('success', 'Proses Cuti sedang diproses, Mohon tunggu konfirmasi');
        }else{
            return back()->with('failed', 'Proses Cuti Tidak Bisa Dilanjutkan, Jumlah cuti anda tidak mencukupi');
        }
    }

    // Perizinan
    public function daftarIzin(){
        $izins = Perizinan::where('user_id', Auth::user()->id)->get();

        return view('pegawai.cuti-perizinan.daftar-izin', [
            'izins' => $izins,
        ]);
        // dd($datas);
    }

    public function ajukanIzin(){
        return view('pegawai.cuti-perizinan.ajukan-izin');
        // dd($datas);
    }

    public function prosesIzin(Request $request){
        // dd($request); 
        if(isset($request->check)){
            $validate = $request->validate([
                'tanggal_mulai' => 'required|after: today',
                'tanggal_berakhir' => 'required|after_or_equal:tanggal_mulai',
                'alasan_perizinan' => 'required',
                'bukti_perizinan' => 'required|mimes:jpeg,png,pdf|max:1024',
            ]);
        }else{
            $validate = $request->validate([
                'tanggal_mulai' => 'required|after: today',
                'alasan_perizinan' => 'required',
                'bukti_perizinan' => 'required|mimes:jpeg,png,pdf|max:2048',
            ]);

            $validate['tanggal_berakhir'] = $validate['tanggal_mulai'];
        }

        $validate['status_perizinan'] = "Menunggu Persetujuan";
        $validate['user_id'] = Auth::user()->id;

        $extension_file = $request->file('bukti_perizinan')->extension();
            
        $nama_file = Auth::user()->pegawai->nama . '-' . now()->timestamp. '.' . $extension_file;

        $validate['bukti_perizinan'] = $request->file('bukti_perizinan')->storeAs('Pegawai/perizinan', $nama_file);

        Perizinan::create($validate);

        return redirect('pegawai/izin')->with('success', 'Proses Cuti sedang diproses, Mohon tunggu konfirmasi');
    }

    public function buktiIzin($id){
        $data = Perizinan::find($id);
        
        return Storage::response($data->bukti_perizinan);
    }

    public function resign(){
        $datas = Resign::where('user_id', Auth::user()->id)->get();

        return view('pegawai.resign.daftar-resign', [
            'datas' => $datas
        ]);
    }

    public function resignForm(){
        return view('pegawai.resign.ajukan-resign');
    }

    public function prosesResign(Request $request){
        // dd($request);
        $date = date('d-m-Y', strtotime('+30 days'));

        $validate = $request->validate([
            'tanggal_resign' => 'required|after:' . $date
        ]);

        $validate['status_resign'] = 'Menunggu Persetujuan';
        $validate['user_id'] = Auth::user()->id;

        Resign::create($validate);

        return redirect('pegawai/resign');
    }
}
