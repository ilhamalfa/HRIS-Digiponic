<?php

namespace App\Http\Controllers;

use App\Mail\SendConfirmMail;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Cuti;
use App\Models\District;
use App\Models\Pegawai;
use App\Models\Pelamar;
use App\Models\Perizinan;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Resign;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dataPegawai() {
        $datas = User::has('pegawai')->where('role', '!=', 'Pelamar')->filter(request(['search']))->paginate(10);

        return view('super-admin.pegawai.daftar-data-pegawai', [
            'datas' => $datas
        ]);
    }

    public function detailPegawai($id) {
        $data = User::find($id);

        return view('super-admin.pegawai.detail-pegawai', [
            'data' => $data
        ]);
    }

    public function dataUser() {
        $datas = User::filter(request(['search']))->paginate(10);
        $provinces = Province::all();

        return view('super-admin.pegawai.daftar-data-user', [
            'datas' => $datas,
            'provinces' => $provinces,
        ]);
    }

    public function daftarCuti() {
        $datas = Cuti::filter(request(['status','search']))->paginate(10);
        
        return view('admin.cuti-perizinan.daftar-cuti', [
            'datas' => $datas,
        ]);
    }

    public function konfirmasiCuti($id, $konfirmasi) {
        $data = Cuti::find($id);
        $user = User::find($data->user_id_1);
        $jml_cuti = date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1;

        if($konfirmasi == 'Accept'){
            $data->update([
                'status' => 'Accepted',
                'user_id_2' => Auth::user()->id
            ]);

            $user->update([
                'jumlah_cuti' => $user->jumlah_cuti - $jml_cuti
            ]);
        }else if($konfirmasi == 'Decline'){
            $data->update([
                'status' => 'Declined',
                'user_id_2' => Auth::user()->id
            ]);
        }

        return back()->with('success', 'Status Cuti Berhasil Dikonfirmasi!');
    }

    public function daftarIzin() {
        $datas = Perizinan::filter(request(['status','search']))->paginate(10);

        return view('admin.cuti-perizinan.daftar-izin', [
            'datas' => $datas,
        ]);
    }

    public function buktiIzin($id) {
        $data = Perizinan::find($id);
        
        return Storage::response($data->bukti_perizinan);
    }

    public function konfirmasiIzin($id, $konfirmasi) {
        $data = Perizinan::find($id);

        if($konfirmasi == 'Accept'){
            $data->update([
                'status' => 'Accepted',
                'user_id_2' => Auth::user()->id
            ]);
        }else if($konfirmasi == 'Decline'){
            $data->update([
                'status' => 'Declined',
                'user_id_2' => Auth::user()->id
            ]);
        }

        return back()->with('success', 'Status Perizinan Berhasil Dikonfirmasi!');
    }

    public function konfirmasiResign($id, $konfirmasi) {
        $data = Resign::find($id);

        if($konfirmasi == 'Accept'){
            $user = User::find($data->user_id_1);

            $data->update([
                'status_resign' => 'Accepted',
                'user_id_2' => Auth::user()->id
            ]);

            $user->update([
                'role' => 'Ex-Employee'
            ]);
        }else if($konfirmasi == 'Decline'){
            $data->update([
                'status_resign' => 'Declined',
                'user_id_2' => Auth::user()->id
            ]);
        }

        return back()->with('success', 'Status Perizinan Berhasil Dikonfirmasi!');
    }

    public function daftarLowongan() {
        $datas = Lowongan::latest()->filter(request(['search']))->paginate(10);
        
        return view('admin.lowongan.daftar-lowongan', [
            'datas' => $datas
        ]);
    }

    public function tambahLowongan() {
        return view('admin.lowongan.input-lowongan');
    }

    public function hapusLowongan($id) {
        $data = Lowongan::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

    public function detailLowongan($id) {
        $data = Lowongan::find($id);
        $datas = Pelamar::where('lowongan_id', $id)->latest()->filter(request(['search', 'status']))->paginate(10);;

        return view('admin.lowongan.daftar-pelamar', [
            'data' => $data,
            'datas' => $datas
        ]);
    }

    public function detailPelamar($id) {
        $data = Lamaran::find($id);

        return view('admin.lowongan.detail-pelamar', [
            'data' => $data,
        ]);
    }

    public function CV($id){
        $data = Pelamar::find($id);

        $cv = $data->cv_file;
        
        return Storage::response($cv);
    }

    public function storeLowongan(Request $request) {
        $validate = $request->validate([
            'posisi' => 'required',
            'tanggal' => 'required|after:yesterday',
            'kualifikasi' => 'required',
            'deskripsi' => 'required'
        ]);

        $alert = Lowongan::create($validate);

        if ($alert) {
            return redirect('data-lowongan')->with('success', 'New vacancy was added!');
        } else {
            return redirect('data-lowongan')->with('error', 'Vacancy not added!');
        }
    }

    public function ubahStatus($id, $status) {
        $data = Pelamar::find($id);

        if($status == 'Wawancara'){
            $status = 'Wawancara';
            $subject = 'Lanjut Tahap Wawancara';
            $body = 'Selamat, untuk sdr '. $data->nama .', Anda berhasil Lolos ke tahap selanjutnya. Dimohon untuk menunggu email selanjutnya yang berisikan link untuk melakukan tahap wawancara. Jika sdr ada pertanyaan, dapat menghubungi Admin atau dapat mengirim email ke HR@Techsolution.com, Terima kasih.';
        }else if($status == 'Psikotest'){
            $status = 'Psikotest';
            $subject = 'Lanjut Tahap Psikotest';
            $body = 'Selamat, untuk sdr '. $data->nama .', Anda berhasil Lolos ke tahap selanjutnya. Dimohon untuk menunggu email selanjutnya yang berisikan link untuk melakukan tahap psikotest. Jika sdr ada pertanyaan, dapat menghubungi Admin atau dapat mengirim email ke HR@Techsolution.com, Terima kasih.';
        }else if($status == 'Offering'){
            $status = 'Offering';
            $subject = 'Lanjut Tahap Offering';
            $body = 'Selamat, untuk sdr '. $data->nama .', Anda berhasil Lolos ke tahap selanjutnya. Dimohon untuk menunggu email selanjutnya mengenai hasil dari proses rekruitment ini. Jika sdr ada pertanyaan, dapat menghubungi Admin atau dapat mengirim email ke HR@Techsolution.com, Terima kasih.';
        }else if($status == 'Terima'){
            $status = 'Diterima';
            $subject = 'Selamat Telah Diterima';
            $body = 'Selamat, untuk sdr '. $data->nama .', Anda berhasil Diterima pada posisi '. $data->lowongan->posisi .'. Dimohon untuk menunggu email selanjutnya yang berisikan tanggal masuk dan daftar berkas-berkas yang wajib dibawa. Jika sdr ada pertanyaan, dapat menghubungi Admin atau dapat mengirim email ke HR@Techsolution.com, Terima kasih.';
        }else{
            $status = 'Ditolak';
            $subject = 'Lamaran Ditolak';
            $body = 'Terimakasih untuk sdr '. $data->nama .' atas minatnya untuk mengikuti proses seleksi ini, kami mohon maaf sebesar-besarnya dikarenakan sdr sudah tidak dapat mengikuti, kami akan menunggu sdr untuk mengikuti seleksi pada masa mendatang';
        }

        $maildata = [
            'subject' => $subject,
            'greeting' => 'Congratulation!',
            'body' => $body
        ];

        Mail::to($data->email)->send(new SendConfirmMail($maildata));

        $data->update([
            'status' => $status
        ]);

        return redirect()->back();
    }

    public function terima($id, Request $request) {
        $data = Lamaran::find($id);
        $user = User::find($data->user_id_1);

        $validate = $request->validate([
            'nik' => 'required',
            'department' => 'required',
            'golongan' => 'required'
        ]);

        $foto = substr($data->user->pelamar->foto, strpos($data->user->pelamar->foto, "/") + 1);   

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
