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
                    <form class="form-horizontal form-label-left" method="post"
                        action="{{action('catedraController@store')}}"
                        style="font-family: Arial, Helvetica, sans-serif;color:black">
                        @csrf
                        <div class="row">
                            <div class="col-md-10 col-sm-12 form-group">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <input type="hidden" id="codeWorkerAl" name="codeWorkerAl">
                                        <label for="codeWorker" class="">Docente*</label>
                                        <div class="input-group">
                                            <input type="text" name="codeTeacher" id="codeTeacher" class="form-control"
                                                required readonly>
                                            @include('Catedra.ListTeachers')
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <label for="nameWorker" class="">Nombres*</label>
                                        <input type="text" name="nameWorker" id="nameWorker" class="form-control"
                                            required readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-12  form-group">
                                <label for="yearPeriod">Año Escolar*</label>
                                <input type="text" name="yearPeriod" id="yearPeriod" class="form-control" required
                                    readonly>
                            </div>

                            <div class="col-md-6 col-sm-12  form-group">
                                <label for="idPeriodo">Bimestre*</label>
                                <select id="idPeriodo" name="idPeriodo" class="form-control" required>
                                    {{--  <option value="">Choose..</option>  --}}
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-12  form-group">
                                <label for="">Nivel*</label>
                                <select id="idLevel" name="idLevel" class="form-control" required>
                                    <option value="">Choose...</option>

                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12  form-group">
                                <label for="">Grado*</label>
                                <select id="idGrade" name="idGrade" class="form-control" required>
                                    {{-- <option value="">Choose..</option> --}}
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12  form-group">
                                <label for="">Seccion*</label>
                                <select id="idSection" name="idSection" class="form-control select5" required>
                                    {{-- <option value="">Choose..</option> --}}
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12  form-group">
                                <label for="">Curso*</label>
                                <select id="idCourse" name="idCourse" class="form-control" required>
                                    {{-- <option value="">Choose..</option> --}}
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 center-margin mt-4">
                                        @include('Catedra.courseTeachers')
                                        <a class="btn bg-success text-white" id="insertCourses">
                                            <i class="fa fa-save"></i>
                                            Insertar</a>
                                        <a href="home" class="btn bg-secondary text-white"><i class="fa fa-reply"></i>
                                            Salir</a>
                                    </div>
                                </div>
                            </div>
                            <table id="table-catedra" class="table table-bordered display nowrap" cellspacing="0"
                                width="100%">
                                <thead class="bg-dark">
                                    <tr>
                                        <th>Código</th>
                                        <th>Curso</th>
                                        <th>Grado</th>
                                        <th>Sección</th>
                                        <th>Bimestre</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <button type="submit" class="btn bg-success btn-sm text-white mt-2 float-right"
                                id="saveCourse"><i class="fa fa-save"></i>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection