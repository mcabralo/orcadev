<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendamentoController extends Controller
{
    public function index(Request $request) {

        $request = DB::table('agendamento');
        // dd($request);

        return view('agendamento.index', compact('request'));
    }
}
