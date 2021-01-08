@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Ver Consultas</h1>
@stop

@section('content')
    <div class="card card-info">
        <div class="card-header">
            @foreach ($agendamentos as $agendamento)
                @if ($loop->last)
                    <h3 class="card-title">Você tem {{ $loop->count }} consultas agendadas</h3>
                @endif
            @endforeach
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <ul class="list-group">
                <div class="conteiner">
                    <div class="row">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">N</th>
                                    <th scope="col">Data da Consulta</th>
                                    <th scope="col">Hora de Início</th>
                                    <th scope="col">Hora Esperada de Término</th>
                                    <th scope="col">Paciente</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            @foreach ($agendamentos as $agendamento)
                                <tbody>
                                    <tr>
                                        <th scope="row"> {{ $loop->iteration }} </th>
                                        <td scope="col">{{ $agendamento->data }}</td>
                                        <td scope="col">{{ $agendamento->horaInicio }}</td>
                                        <td scope="col">{{ $agendamento->horaTermino }}</td>
                                        <td scope="col">{{ $agendamento->name }}</td>
                                        @if ($agendamento->data < Carbon\Carbon::now())
                                            <td scope="col">Realizada</td>
                                        @else
                                            <td scope="col">Marcada</td>
                                        @endif
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>


            </ul>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            *É recomendado a chegada com pelo menos 15min de antecedência. Horário sujeito a lotação.
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
@stop
