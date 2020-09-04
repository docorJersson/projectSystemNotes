@extends('layouts.templeate')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Mantenimiento de Cursos</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-8 center-margin">
                <div class="row">
                    <div class="col-md-6 col-sm-5">
                        @include('Maintainer.RegisterCourses')
                    </div>
                    <div class="col-md-6 col-sm-3 form-group pull-right top_search">
                        <form class="input-group">
                          <input type="text" name="codeCourse" class="form-control" placeholder="Buscar por código">
                          <span class="input-group-btn">
                            <button class="btn btn-secondary text-white" type="submit">Go!</button>
                          </span>
                        </form>
                    </div>
                    <div class="col-md-12 form-group form-group">
                        <table class="table table-bordered">
                            <thead class="">
                                <tr>
                                    <th>Código</th>
                                    <th>Curso</th>
                                    <th>Nivel</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>
                                        @include('Maintainer.EditCourses')
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <button class="btn btn-app bg-secondary text-white"><i class="fa fa-reply"></i> Salir</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection