@extends('layouts.templeate')

@section('content')
<div class="container p-5">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Mantenimiento de Cátedra</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="col-md-10 center-margin">      
                    <form class="form-horizontal form-label-left" style="font-family: Arial, Helvetica, sans-serif;color:black">
                        <div class="row">
                            <div class="col-md-10 col-sm-12 form-group">
                                <label for="">Docente*</label>
                                <div class="row">
                                    <div class="col-md-3 input-group">
                                        <input type="text" name="codeWorker" class="form-control" required>
                                        @include('Maintainer.ListTeachers')
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input type="text" name="nameWorker " class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-12  form-group">
                                    <label for="">Año Escolar*</label>
                                    <input type="text" class="form-control" required>
                            </div>

                            <div class="col-md-3 col-sm-12  form-group">
                                    <label for="">Nivel*</label>
                                    <select id="heard" name="idLevel " class="form-control" required>
                                        <option value="">Choose..</option>
                                    </select>
                            </div>
                            <div class="col-md-3 col-sm-12  form-group">
                                    <label for="">Grado*</label>
                                    <select id="heard" name="idGrade " class="form-control" required>
                                        <option value="">Choose..</option>
                                    </select>
                            </div>
                            <div class="col-md-3 col-sm-12  form-group">
                                    <label for="">Seccion*</label>
                                    <select id="heard" name="idSection " class="form-control" required>
                                        <option value="">Choose..</option>
                                    </select>
                            </div>
                            <div class="col-md-3 col-sm-12  form-group">
                                    <label for="">Curso*</label>
                                    <select id="heard" name="idCourse " class="form-control" required>
                                        <option value="">Choose..</option>
                                    </select>
                            </div>
                            <div class="col-md-12 col-sm-12 form-group p-3">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 center-margin">
                                        <a class="btn bg-info text-white"><i class="fa fa-bars"></i> Mostrar</a>
                                        <button class="btn bg-success text-white" type="submit"><i class="fa fa-save"></i> Insertar</button>
                                        <a class="btn bg-secondary text-white"><i class="fa fa-reply"></i> Salir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                                
                    <table id="table-catedra" class="table table-bordered display nowrap"cellspacing="0" width="100%">
                        <thead class="bg-dark">
                            <tr>
                                <th>Código</th>
                                <th>Curso</th>
                                <th>Grado</th>
                                <th>Sección</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Ciencias</td>
                                <td>3er Grado</td>
                                <td>A</td>
                            </tr>
                         
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection