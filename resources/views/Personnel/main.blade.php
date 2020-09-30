@extends('layouts.templeate')

@section('content')
<div class="container p-5">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Mantenimiento del Personal</h3>
        </div>
        <div class="card-body">
            <div class="container table-responsive">
                <table id="table-workers" class="table table-bordered nowrap" cellspacing="0" width="100%">
                    <thead class="bg-dark">
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>DNI</th>
                            <th>Dirección</th>
                            <th>Estado Civil</th>
                            <th>Teléfono</th>
                            <th>Seguro Social</th>
                            <th>Fecha</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection