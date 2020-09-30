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
                    <form class="form-horizontal form-label-left"
                        style="font-family: Arial, Helvetica, sans-serif;color:black">
                        <div class="row">
                            <div class="col-md-10 col-sm-12 form-group">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="codeWorker" class="">Docente*</label>
                                        <div class="input-group">
                                            <input type="text" name="codeWorker" id="codeWorker" class="form-control"
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
                                <input type="text" class="form-control" name="yearPeriod" id="yearPeriod" required
                                    readonly>
                            </div>

                            <div class="col-md-6 col-sm-12  form-group">
                                <label for="">Nivel*</label>
                                <select id="idLevel" name="idLevel" class="form-control select3" required>
                                    <option value="">Choose...</option>
                                    @foreach ($level as $l)
                                    <option value="{{$l->idLevel}}">{{$l->descriptionLevel}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12  form-group">
                                <label for="">Grado*</label>
                                <select id="idGrade" name="idGrade" class="form-control select4" required>
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
                                <select id="idCourse" name="idCourse" class="form-control select6" required>
                                    {{-- <option value="">Choose..</option> --}}
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12 form-group p-3">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 center-margin">
                                        <a class="btn bg-info text-white"><i class="fa fa-bars"></i> Mostrar</a>
                                        <button class="btn bg-success text-white" type="submit"><i
                                                class="fa fa-save"></i> Insertar</button>
                                        <a class="btn bg-secondary text-white"><i class="fa fa-reply"></i> Salir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <table id="table-catedra" class="table table-bordered display nowrap" cellspacing="0" width="100%">
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