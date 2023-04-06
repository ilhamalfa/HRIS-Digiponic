<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pelamar;
use App\Models\Province;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'user-access:SuperAdmin,Admin,Pegawai']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Pelamar::where('user_id', auth()->user()->id)->first();
        $data1 = Pegawai::where('user_id', auth()->user()->id)->first();

        if(auth()->user()->role == 'Pelamar' && $data === null){
            return redirect('/pelamar/input-data-pelamar');
        }else if(auth()->user()->role != 'Pelamar' && $data1 === null){
            return redirect('/pegawai/input-pegawai');
        }else{
            return view('home');
        }
        
    }

    // public function rutelogin(Request $request)
    // {
    //     dd($request);
    //     if ($request->has('inputemployee')) {
    //         $person = 1;
    //     } elseif ($request->has('inputcandidate')) {
    //         $person = 2;
    //     } else {
    //         return redirect('errors.404');
    //     }
    //     return view('auth.login', compact('person'));
    // }
}
