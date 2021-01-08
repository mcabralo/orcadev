<?php

namespace App\Http\Controllers;

use App\Agendamento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgendamentoController extends Controller
{
    public function index()
    {
        $idUsuario = Auth::user()->id;
        // dd(Auth::user());

        // $cargo = DB::table('users as u')
        //     ->join('medicos as m', 'u.id', '=', 'm.medicoId')
        //     ->where('u.id', Auth::user()->id)
        //     ->get('tipo');

        // $agendamentos = DB::table('agendamentos')
        // ->where('medId' , $idUsuario)
        // ->get();

        $agendamentos = DB::table('agendamentos AS a')
            ->join('users AS u', 'a.pacId', '=', 'u.id')
            ->where('a.medId', $idUsuario)
            ->get();

        // dd($agendamentos);

        // if ($cargo == 1) {
        //     return view('agendamento.index', compact('agendamentos'));
        // }


        // dd($request, $idUsuario);

        return view('agendamento.index', compact('agendamentos'));
    }

    public function create(Request $request)
    {
        $idUsuario = Auth::user()->id;

        $medicos = DB::table('medicos as m')
            ->join('users AS u', 'm.medicoId', '=', 'u.id')
            ->get();

        $cargo = DB::table('users as u')
            ->join('medicos as m', 'u.id', '=', 'm.medicoId')
            ->where('u.id', Auth::user()->id)
            ->get('tipo');

        // $carbon = new Carbon(strtotime('now') + 60*60);
        // dd($carbon);

        // dd($medicos);

        return view('agendamento.create', compact('medicos', 'cargo'));
    }

    public function store(Request $request)
    {
        $agendamentos = DB::table('agendamentos AS a')
            ->join('users AS u', 'a.pacId', '=', 'u.id')
            ->where('a.medId', Auth::user()->id)
            ->get();

        $hTermino = strtotime($request->horaInicio) + 60 * 60;
        $request['horaTermino'] = strftime('%H:%M', $hTermino);

        $request['pacId'] = (string)Auth::user()->id;

        // dd($request->all());
        Agendamento::create([
            'data' => $request->data,
            'horaInicio' => $request->horaInicio,
            'horaTermino' => $request->horaTermino,
            'medId' => $request->medId,
            'pacId' => $request->pacId,
        ]);

        return view('/agendamento/index', compact('agendamentos'));
    }
}
