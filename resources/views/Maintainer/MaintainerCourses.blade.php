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
                        <!--div class="col-6"></div>
                        <div class="col-md-6 col-sm-3 form-group pull-right top_search">
                            <form class="input-group">
                              <input type="text" name="codeCourse" class="form-control" placeholder="Buscar por código">
                              <span class="input-group-btn">
                                <button class="btn btn-secondary text-white" type="submit">Go!</button>
                              </span>
                            </form>
                        </div-->
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <label for="" class="col-form-label col-md-2 col-sm-12">Periodo*</label>
                                <div class="col-md-10 col-sm-12">
                                    <select name="idLevel" id="idLevel" class="form-control select1">
                                        <option value=""></option>
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
                                <th>Nivel</th>
                                <th>Grado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Ciencias</td>
                                <td>3er Grado</td>
                                <td>1255</td>
                                <td>
                                @include('Maintainer.EditCourses')
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                         
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