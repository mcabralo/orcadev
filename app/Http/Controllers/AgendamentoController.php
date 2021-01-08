<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgendamentoController extends Controller
{
    public function index() {
        $idUsuario = Auth::user()->id;

        // $agendamentos = DB::table('agendamentos')
        // ->where('medId' , $idUsuario)
        // ->get();

        $agendamentos = DB::table('agendamentos AS a')
        ->join('users AS u', 'a.pacId', '=', 'u.id')
        ->where('a.medId' , $idUsuario)
        ->get();

        // dd($agendamentos);



        // dd($request, $idUsuario);

        return view('agendamento.index', compact('agendamentos'));
    }
}
