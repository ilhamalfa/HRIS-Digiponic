<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/');
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
