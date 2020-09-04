@extends('layouts.templeate')

@section('content')
<div class="container-fluid row">
    <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Registro de Notas</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-8 center-margin">
                <form class="form-horizontal form-label-left">
                    <div class="row">
                        <div class="col-md-4 col-sm-12  form-group">
                            <label for="">Nivel*</label>
                            <select id="heard" name="idLevel " class="form-control" required>
                                <option value="">Seleccione</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-sm-12  form-group">
                            <label for="">Periodo*</label>
                            <select id="heard" name="idperiod " class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="">2015</option>
                                <option value="">2016</option>
                                <option value="">2017</option>
                                <option value="">2018</option>
                                <option value="">2019</option>
                                <option value="">2020</option>
                            </select>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-md-4 col-sm-12  form-group">
                            <label for="">Grado*</label>
                            <select id="heard" name="idDegree " class="form-control" required>
                                <option value="">Seleccione</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-sm-12  form-group">
                            <label for="">Sección*</label>
                            <select id="heard" name="idSection " class="form-control" required>
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-md-4 col-sm-12  form-group">
                            <label for="">Curso*</label>
                            <select id="heard" name="idCourse " class="form-control" required>
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-md-8 col-sm-12 form-group">
                            <label for="">Docente*</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6 col-sm-12  form-group">
                            <label for="">Capacidad*</label>
                            <select id="heard" name="idCapacity " class="form-control" required>
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-10 form-group text-center">
                            <button class="btn btn-app bg-success text-white" type="submit"><i class="fa fa-save"></i> Procesar</button>
                        </div>
                    </div>
                </form><hr>
                 <div class="row">
                    <div class="col-md-12 col-sm-2 form-group form-group">
                        <label for="">Alumnos Matriculados:</label>
                        <table class="table table-bordered">
                            <thead class="">
                                <tr>
                                    <th>#</th>
                                    <th>Alumno</th>
                                    <th>Nota 1</th>
                                    <th>Nota 2</th>
                                    <th>Nota 3</th>
                                    <th>Nota 4</th>
                                    <th>Promedio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                    <div class="col-md-2 col-sm-2 form-group">
                        <label for="">Total de Alumnos*</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-8 col-sm-10 form-group text-center">
                            <a class="btn btn-app bg-secondary text-white"><i class="fa fa-reply"></i> Salir</a>
                            <a class="btn btn-app bg-info text-white"><i class="fa fa-file"></i> Reporte Anual</a>
                            <a class="btn btn-app bg-primary text-white"><i class="fa fa-file"></i> Reporte 1 Bimestre</a>
                    </div>
                </div>           
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection