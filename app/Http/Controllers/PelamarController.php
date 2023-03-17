<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        $extension_cv = $request->file('foto')->extension();

        $nama_cv = $request->nama . '-' . now()->timestamp. '.' . $extension_cv;

        $validate['cv_file'] = $request->file('cv_file')->storeAs('Pelamar/cv', $nama_cv);

        Pelamar::create($validate);
        
        return redirect('home');
        // dd($validate);
    }

}
