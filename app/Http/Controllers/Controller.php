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

    public function career()
    {
        $datas = Lowongan::filter(request(['search', 'closed', 'orderBy']))->where('tanggal', '>', now()->toDateString())->paginate(5);
        return view('career.career', compact('datas'));
    }
}
