@extends('layouts.templeate')
@section('content')
<div class="container p-5">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Mantenimiento de Cursos</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="col-md-10 center-margin" style="font-family: Arial, Helvetica, sans-serif;color:black">
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <label for="" class="col-form-label col-md-3 col-sm-12">Período</label>
                                <div class="col-md-9 col-sm-12">
                                    <select name="idLevel" id="idLevel" class="form-control select2">
                                        @foreach($getPeriod as $period)
                                        <option value="{{$period->yearPeriod}}">{{$period->yearPeriod}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="table-curso" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                        <thead class="bg-dark">
                            <tr>
                                <th>Código</th>
                                <th>Curso</th>
                                <th>Grado</th>
                                <th>Nivel</th>
                                <th>Bimiestre</th>
                                <th>Período-Año</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getCourse as $course)
                            <tr>
                                <th scope="row"><input type="hidden" name="idCourse">{{$course->codeCourse}}</th>
                                <td>{{$course->descriptionCourse}}</td>
                                <td>{{$course->descriptionGrade}}</td>
                                <td>{{$course->descriptionLevel}}</td>
                                <td>{{$course->bimester}}</td>
                                <td>{{$course->yearPeriod}}</td>
                                <td>
                                    @include('Maintainer.EditCourses')
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-4 col-sm-6">
                        <button class="btn bg-secondary text-white"><i class="fa fa-reply"></i> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection