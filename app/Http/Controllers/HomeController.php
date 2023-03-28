<?php

namespace App\Http\Controllers;

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
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
        return redirect('/');
=======
        $data = Pelamar::where('user_id', auth()->user()->id)->first();

        if(auth()->user()->role == 'Pelamar' && $data === null){
            return redirect('/input-data-pelamar');
        }else{
            return view('home');
        }
        
>>>>>>> f8ab25b510e1d9f2f208030b5ec9678e8a9c7a80
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
