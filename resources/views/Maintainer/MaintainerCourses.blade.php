@extends('layouts.templeate')

@section('content')
<div class="container-fluid row">
    <div class="col-md-12 col-sm-12" style="font-family: Arial, Helvetica, sans-serif;font-size: 14px;color:black">
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
                                <input type="text" name="codeCourse" class="form-control"
                                    placeholder="Buscar por código">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary text-white" type="submit">Go!</button>
                                </span>
                            </form>
                        </div>
                        <div class="col-md-12 form-group form-group">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Código</th>
                                        <th>Curso</th>
                                        <th>Nivel</th>
                                        <th>Grado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($course as $curso)
                                    <tr>
                                        <th scope="row">{{$curso->codeCourse}}</th>
                                        <td>{{$curso->descriptionCourse}}</td>
                                        <td>{{$curso->descriptionLevel}}</td>
                                        <td>{{$curso->descriptionGrade}}</td>
                                        <td>
                                            @include('Maintainer.EditCourses')
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$course->links()}}
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <button class="btn btn-app bg-secondary text-white"><i class="fa fa-reply"></i>
                                Salir</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection