<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananDiprosesController extends Controller
{
    public function index()
    {
        $pesananDiproses = DB::table('pesanan_diproses')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('pesanan.index', [
            'pesanans' => $pesananDiproses,
        ]);
    }
}
