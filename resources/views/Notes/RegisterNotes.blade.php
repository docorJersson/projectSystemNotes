@extends('layouts.templeate')

@section('content')
<div class="container p-5">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Registro de Notas</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="col-md-10 center-margin" style="font-family: Arial;color:black">
                    <form class="form-horizontal form-label-left" action="{{URL::to('notes')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Nivel*</label>
                                <select id="idLevel" name="idLevel " class="form-control" required>
                                    <option value="">Choose...</option>
                                </select>
                            </div>

                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Grado*</label>
                                <select id="idGrade" name="idDegree " class="form-control" required>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Año Escolar*</label>
                                <input type="text" id="yearPeriod" name="yearPeriod " class="form-control" required>
                            </div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Periodo</label>
                                <select id="idPeriodo" name="idPeriodo" class="form-control" required></select>
                            </div>

                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Sección*</label>
                                <select id="idSection" name="idSection " class="form-control" required>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Curso*</label>
                                <select id="idCourse" name="idCourse " class="form-control" required>
                                </select>
                            </div>
                            <div class="col-md-1 mt-md-4 col-sm-12 form-group">
                                @include('Catedra.ListTeachers')
                            </div>

                            <div class="col-md-11 col-sm-12 form-group">
                                <label for="">Docente*</label>
                                <input type="hidden" id="codeWorkerAl" name="codeWorker">
                                <input type="hidden" id="codeTeacher">
                                <input type="text" class="form-control" id="nameWorker" required readonly>
                            </div>
                            <hr>

                            <div class="col-12 form-group">
                                <a type="button" class="btn btn-success text-white float-right" id="procesar">
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="" style="font-family: Arial; font-size: 15px;">Alumnos Matriculados:</label>
                                <input type="hidden" id="capacidades" name="idDetailCapacity">
                                <div class="table-responsive">
                                    <table id="tableNotes" class="table table-bordered display nowrap" cellspacing="0"
                                        width="100%">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Alumno</th>
                                                <th>Capacidad</th>
                                                <th>Nota de Periodo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 form-group">
                                <input type="submit" value="Guardar">
                            </div>

                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-2 col-sm-2 form-group">
                            <label for="">Total de Alumnos*</label>
                            <input type="text" class="form-control" id="totalStudent">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-8 col-sm-10 form-group text-center p-4">
                            <a href="home" class="btn bg-secondary text-white"><i class="fa fa-reply"></i></a>
                            <a class="btn bg-info text-white"><i class="fa fa-file"></i> Reporte Anual</a>
                            <a class="btn bg-primary text-white"><i class="fa fa-file"></i> Reporte 1 Bimestre</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="js/notes.js"></script>
@endsection