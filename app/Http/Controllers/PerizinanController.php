<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Perizinan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PerizinanController extends Controller
{
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

}
