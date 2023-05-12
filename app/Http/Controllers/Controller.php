<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function rutelogin()
    {
        return view('auth.login');
    }

    public function struktur()
    {
        return view('struktur.struktur');
    }

    public function career()
    {
        $datas = Lowongan::filter(request(['search', 'orderBy']))->where('tanggal', '>=', now()->toDateString())->paginate(5);
        return view('career.career', compact('datas'));
    }              

    public function search()
    {
        if (isset($_GET['search'])) {
            if ($_GET['search'] == '') {
                $datas = Lowongan::paginate(5);
            } else {
                $datas = Lowongan::where('posisi', 'LIKE', '%' . $_GET['search'] . '%')->paginate(5);
            }
        } else {
            $datas = Lowongan::paginate(5);
        }
        return view('career.career', compact('datas'));
    }

    public function filter()
    {
        if (isset($_GET['filter'])) {
            if ($_GET['filter'] == 'lastest') {
                $datas = Lowongan::orderBy("created_at", "desc")->paginate(5);
            } elseif ($_GET['filter'] == 'deadline') {
                $datas = Lowongan::orderBy("tanggal", "asc")->paginate(5);
            } else {
                $datas = Lowongan::paginate(5);
            }
        } else {
            $datas = Lowongan::paginate(5);
        }
        return view('career.career', compact('datas'));
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
