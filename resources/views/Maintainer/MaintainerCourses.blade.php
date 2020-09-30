@extends('layouts.templeate')
@section('content')
<div class="container p-5">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Mantenimiento de Cursos</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="col-md-11 center-margin" style="font-family: Arial, Helvetica, sans-serif;color:black">
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <label for="" class="col-form-label col-md-3 col-sm-12">Período</label>
                                <div class="col-md-9 col-sm-12">
                                    <select name="idPeriod" id="idPeriod" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="table-curso" class="table table-bordered nowrap" cellspacing="0" width="100%">
                            <thead class="bg-dark">
                                <tr>
                                    <th>Código de Curso</th>
                                    <th>Curso</th>
                                    <th>Grado</th>
                                    <th>Sección</th>
                                    <th>Nivel</th>
                                    <th>Bimestre:</th>
                                    <th>Profesor a Cargo:</th>
                                    <th>Periodo</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <button class="btn bg-secondary text-white"><i class="fa fa-reply"></i> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection