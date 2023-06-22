<?php

namespace App\Http\Controllers;

use App\Mail\SendConfirmMail;
use App\Models\District;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Pelamar;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\fileExists;

class PelamarController extends Controller
{
    
    public function inputPelamar(){
        $provinces = Province::all();

        $data = Pelamar::where('user_id', auth()->user()->id)->first();

        if ($data === null) {
            return view('pelamar.input-data', [
                'provinces' => $provinces
            ]);
        }else{
            return redirect('home');
        }
    }

    public function storePelamar(Request $request){
        // dd($request);
        $validate = $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|before:17 years ago',
            'jenis_kelamin' => 'required',
            'nomor_hp' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' =>'required',
            'village_id' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image',
            'cv_file' => 'required|mimetypes:application/pdf'
        ]);

        $validate['umur'] = Carbon::parse($request->tanggal_lahir)->age;

        $validate['email'] = auth()->user()->email;

        $validate['user_id'] = auth()->user()->id;

        $extension_foto = $request->file('foto')->extension();
            
        $nama_foto = $request->nama . '-' . now()->timestamp. '.' . $extension_foto;

        $validate['foto'] = $request->file('foto')->storeAs('Pelamar/foto', $nama_foto);

        $extension_cv = $request->file('cv_file')->extension();

        $nama_cv = $request->nama . '-' . now()->timestamp. '.' . $extension_cv;

        $validate['cv_file'] = $request->file('cv_file')->storeAs('Pelamar/cv', $nama_cv);

        Pelamar::create($validate);
        
        return redirect('home');
    }

    public function editPelamar(){
        $data = Pelamar::where('user_id', Auth::user()->id)->first();

        $provinces = Province::all();
        $regency = Regency::find($data->regency_id);
        $district = District::find($data->district_id);
        $village = Village::find($data->village_id);

        // dd($districts);

        return view('pelamar.edit-data-pelamar', [
            'data' => $data,
            'provinces' => $provinces,
            'regency' => $regency,
            'district' => $district,
            'village' => $village
        ]);
    }

    public function updatePelamar(Request $request){
        $data = Pelamar::find(Auth::user()->pelamar->id);
        // dd($data);

        $validate = $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|before:17 years ago',
            'jenis_kelamin' => 'required',
            'nomor_hp' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' =>'required',
            'village_id' => 'required',
            'alamat' => 'required',
        ]);

        $validate['umur'] = Carbon::parse($request->tanggal_lahir)->age;

        if($request->has('foto')){
            $request->validate([
                'foto' => 'required|image',
            ]);

            if(fileExists('storage/'. $data->foto)){
                unlink('storage/'. $data->foto);
            }
    
            $extension_foto = $request->file('foto')->extension();
                
            $nama_foto = $request->nama . '-' . now()->timestamp. '.' . $extension_foto;
    
            $validate['foto'] = $request->file('foto')->storeAs('Pegawai/foto', $nama_foto);
        }

        if($request->has('cv_file')){
            $request->validate([
                'cv_file' => 'required|mimetypes:application/pdf'
            ]);

            if(fileExists('storage/'. $data->cv_file)){
                unlink('storage/'. $data->cv_file);
            }

            $extension_cv = $request->file('cv_file')->extension();

            $nama_cv = $request->nama . '-' . now()->timestamp. '.' . $extension_cv;

            $validate['cv_file'] = $request->file('cv_file')->storeAs('Pelamar/cv', $nama_cv);
        }

        // dd($validate);
        
        $data->update($validate);

        return redirect()->back();
    }

    public function daftarLowongan(){
        $datas = Lowongan::all();
        return view('pelamar.lowongan.daftar-lowongan', [
            'datas' => $datas
        ]);
    }

    public function applyLowongan($id, Request $request){

        $lowongan = Lowongan::find($id);

        $validate = $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|before:17 years ago',
            'nomor_hp' => 'required',
            'email' => 'required|email',
            'cv_file' => 'required|mimetypes:application/pdf'
        ]);

        $validate['tanggal_melamar'] = Carbon::now();
        $validate['status'] = 'Menunggu';
        $validate['lowongan_id'] = $id;

        $extension_cv = $request->file('cv_file')->extension();
        $nama_cv = $id . '-' .$lowongan->posisi .'_'. $request->nama .'-'. now()->timestamp. '.' . $extension_cv;
        $validate['cv_file'] = $request->file('cv_file')->storeAs('Pelamar/cv', $nama_cv);

        $alert = Pelamar::create($validate);

        $maildata = [
            'subject' => "Success! You have applied for " . $lowongan->posisi,
            'greeting' => 'Hi There! ' . $validate['nama'],
            'body' => "You have applied for ". $lowongan->posisi . ". Please kindly wait and check your email for our next process",
        ];

        Mail::to($validate['email'])->send(new SendConfirmMail($maildata));

        if($alert) {
            return redirect('career')->with('success', 'Vacancy apllied, please check your email!');
        } else {
            return redirect('career')->with('error', 'Vacancy not apllied, please try again later..');
        }
    }

    public function daftarLamaran(){
        $datas = Lamaran::where('user_id', Auth::user()->id)->get();
        
        return view('pelamar.lamaran.daftar-lamaran', [
            'datas' => $datas
        ]);
    }
}
