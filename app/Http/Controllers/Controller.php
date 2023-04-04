<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function rutelogin(Request $request)
    {
        // dd($request);
        
        if ($request->has('inputemployee')) {
            $person = 1;
        } elseif ($request->has('inputcandidate')) {
            $person = 2;
        } else {
            return redirect('errors.404');
        }
        return view('auth.login', compact('person'));
    }

    public function struktur()
    {
        return view('struktur.struktur');
    }

    public function career()
    {
        // $datas = DB::select('SELECT created_at FROM lowongans');
        $datas = Lowongan::all();
        return view('career.career', compact('datas'));
    }

    public function careerVacancyDetail($id)
    {
        $datas = Lowongan::find($id);
        return view('career.career-detail', compact('datas'));
    }

    public function aboutus()
    {
        return view('aboutus');
    }

    public function product()
    {
        return view('product');
    }
}
