@extends('layouts.templeate')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Mantenimiento de Cátedra</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-8 center-margin">      
                    <form class="form-horizontal form-label-left">
                        <div class="row">
                            <div class="col-md-10 col-sm-12 form-group">
                                <label for="">Docente*</label>
                                <div class="row">
                                    <div class="col-md-2 col-sm-10">
                                        <input type="text" name="codeWorker  " class="form-control" required>
                                    </div>
                                    <div class="col-md-1 col-sm-2">
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
                                    <select id="heard" name="idDegree " class="form-control" required>
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
                                        <a class="btn btn-app bg-info text-white"><i class="fa fa-bars"></i> Mostrar</a>
                                        <button class="btn btn-app bg-success text-white" type="submit"><i class="fa fa-save"></i> Insertar</button>
                                        <a class="btn btn-app bg-secondary text-white"><i class="fa fa-reply"></i> Salir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                                
                    <table class="table table-bordered">
                        <thead>
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