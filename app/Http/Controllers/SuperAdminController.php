<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Pegawai as Pegawai;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Resign;
use App\Models\User;
use App\Models\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\fileExists;

class SuperAdminController extends Controller
{
    public function inputUser()
    {
        $provinces = Province::all();

        return view('super-admin.pegawai.input-user-pegawai', [
            'provinces' => $provinces
        ]);
    }

    public function storeUser(Request $request)
    {

        $validate = $request->validate([
            'nik' => 'required|unique:users|min:16|max:16',
            'nama' => 'required',
            'email' => 'required|unique:users|email',
            'tanggal_lahir' => 'required|before:17 years ago',
            'jenis_kelamin' => 'required',
            'nomor_hp' => 'required',
            'status_pernikahan' => 'required',
            'department' => 'required',
            'golongan' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $validate['jumlah_cuti'] = 14;
        $validate['umur'] = Carbon::parse($request->tanggal_lahir)->age;

        if ($request->has('jumlah_anak')) {
            $validate['jumlah_anak'] = $request->jumlah_anak;
        } else {
            $validate['jumlah_anak'] = 0;
        }

        if ($request->department == 'Human Resource') {
            $validate['role'] = 'Admin';
        } else {
            $validate['role'] = 'Pegawai';
        }

        $validate['password'] = Hash::make($request->password);

        User::create($validate);

        $data = User::where('email', $validate['email'])->first();
        $data->sendEmailVerificationNotification();

        Session::flash('success');
        Session::flash('message', 'Add new user success!');

        return redirect('/data-user');
    }

    public function deleteUser($id)
    {
        $data = User::find($id);

        if (fileExists('storage/' . $data->foto)) {
            unlink('storage/' . $data->foto);
        }

        if (fileExists('storage/' . $data->digital_signature)) {
            unlink('storage/' . $data->digital_signature);
        }

        $data->delete();

        return redirect()->back();
    }

    public function editUser($id)
    {
        $data = User::find($id);
        $provinces = Province::all();
        $regency = Regency::find($data->regency_id);
        $district = District::find($data->district_id);
        $village = Village::find($data->village_id);

        return view('super-admin.pegawai.edit-data-pegawai', [
            'data' => $data,
            'provinces' => $provinces,
            'regency' => $regency,
            'district' => $district,
            'village' => $village
        ]);
    }

    public function updateUser($id, Request $request)
    {
        $data = User::find($id);

        // dd($data);

        // dd($request);
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
            'district_id' => 'required',
            'village_id' => 'required',
            'alamat' => 'required',
        ]);

        $validate['umur'] = Carbon::parse($request->tanggal_lahir)->age;

        if ($request->has('jumlah_anak')) {
            $validate['jumlah_anak'] = $request->jumlah_anak;
        }

        $data->update($validate);

        Session::flash('success');
        Session::flash('message', 'Edit user success!');

        return redirect('/data-user');
    }

    public function resign()
    {
        $datas = Resign::filter(request(['status', 'search']))->paginate(10);

        return view('super-admin.resign.daftar-resign', [
            'datas' => $datas
        ]);
    }
}
