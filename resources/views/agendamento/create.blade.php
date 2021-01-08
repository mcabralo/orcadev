@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Fazer Consulta</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('registrarAgendamento') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleSelect1">Escolha o Médico</label>
                    <select class="form-control" id="exampleSelect1" required autofocus name="medId">
                        <option selected selected disabled>Selecione o médico</option>
                        @foreach ($medicos as $medico)
                            <option value="{{ $medico->id }}" >{{ $medico->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-2">
                        <label for="example-date-input">Data da Consulta</label>
                        <input name="data" class="form-control" type="date" value="2021-01-08" id="example-date-input">
                    </div>
                    <div class="form-group col-2">
                        <label for="example-date-input">Horário</label>
                        {{-- @php
                        $horaInicio = "1:00";
                        @endphp --}}
                        <input class="form-control" type="time" name="horaInicio" value="horaInicio"
                            id="example-time-input">
                    </div>
                    {{-- <div hidden class="form-group col-2">
                        <label for="example-date-input">Horário</label>
                        <input class="form-control" type="time"
                            value="@php $carbon = strtotime($horaInicio) + 60*60; @endphp" id="example-time-input">
                    </div> --}}
                </div>
                {{-- @php
                $dataHora = strftime('%H:%M', $carbon);
                @endphp --}}

                {{-- {{ dd($dataHora) }} --}}


                <button class=" btn btn-primary float-right ml-1" type="submit">Realizar Consulta</button>
                <button class=" btn btn-secondary float-right ml-1" type="reset">Limpar Dados</button>
            </form>

        </div>

    </div>

@stop
