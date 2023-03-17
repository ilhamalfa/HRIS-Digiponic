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
        $data = Pelamar::where('user_id', auth()->user()->id)->first();
        if($data === null){
            return redirect('/input-data-pelamar');
        }else{
            return view('home');
        }
        
    }
}
