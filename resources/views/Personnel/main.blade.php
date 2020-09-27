@extends('layouts.templeate')

@section('content')
<div class="container p-5">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Mantenimiento del Personal</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <table id="table-workers" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                    <thead class="bg-dark">
                        <tr>
                            <th>Código</th>
                            <th>Nombres</th>
                            <th>DNI</th>
                            <th>Dirección</th>
                            <th>Estado Civil</th>
                            <th>Teléfono</th>
                            <th>Seguro Social</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workers as $w)
                        <tr>
                            <td>{{$w->codeWorker}}</td>
                            <td>{{$w->lastNameWorker}}, {{$w->nameWorker}}</td>
                            <td>{{$w->dniWorker}}</td>
                            <td>{{$w->addressWorker}}</td>
                            <td>{{$w->civilStatus}}</td>
                            <td>{{$w->telephone}}</td>
                            <td>{{$w->socialSecurity}}</td>
                            <td>{{$w->dateWorker}}</td>
                            <td>@include('Personnel.editPersonnel')
                                <a href="{{route('personnel.destroyed',$w->codeWorker)}}"
                                    class="btn btn-danger text-white btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminarlo?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection