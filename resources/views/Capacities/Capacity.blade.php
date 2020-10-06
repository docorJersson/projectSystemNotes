@extends('layouts.templeate')

@section('content')
<div class="container p-5">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Mantenimiento de Asignaturas/Capacidades</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="col-md-10 center-margin">
                    <form class="form-horizontal form-label-left" style="font-family: Arial;color:black" method="post"
                        action="{{action('capacitiesController@store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Nivel*</label>
                                <select id="idLevel" name="idLevel" class="form-control" required>
                                    <option value="0">Choose..</option>
                                </select>
                            </div>

                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Grado*</label>
                                <select id="idGrade" name="idGrade" class="form-control" required>
                                    <option value="">Choose..</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 form-group">
                                <label for="">Año Escolar*</label>
                                <input type="text" id="idPeriod" name="idPeriod" class="form-control" required readonly>
                            </div>

                            <div class="col-md-6 col-sm-12 form-group">
                                <label for="">Periodo*</label>
                                <select id="idPeriodo" name="idPeriodo" class="form-control" required>
                                    <option value="0">Choose..</option>
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-12  form-group">
                                <label for="">Curso*</label>
                                <select id="idCourse" name="idCourse" class="form-control" required>
                                    <option value="">Choose..</option>
                                </select>
                            </div>
                            <div class="col-md-1 col-sm-12 form-group m-0">
                                <div class="mt-md-4 mt-sm-0">
                                    @include('Capacities.allCapacities')
                                </div>
                            </div>
                            <div class="col-md-11 col-sm-12 form-group">
                                <input type="hidden" name="idCapacity" id="idCapacity">
                                <label for="">Asignatura/Capacidad*</label>
                                <input type="text" id="descriptionCapacity" name="descriptionCapacity"
                                    class="form-control" required readonly>
                            </div>

                            <div class="col-md-4 col-sm-12 form-group">
                                <label for="">Abreviatura</label>
                                <input type="text" id="abreviation" name="abbreviation" class="form-control" required
                                    readonly>
                            </div>
                            <div class="col-md-4 col-sm-12 form-group">
                                <label for="">Orden*</label>
                                <input type="number" id="orderCapacity" name="orderCapacity" class="form-control"
                                    min="1" max="10" required>
                            </div>

                            <div class="col-md-4 col-sm-12 form-group p-4 text-center">
                                <a class="btn btn-warning text-white" id="download"><i class="fas fa-download"></i></a>
                                <a class="btn btn-danger text-white" id="close"><i class="fas fa-window-close"></i></a>
                            </div>

                            <div class="table-responsive">
                                <table id="tableCoursesCapacity" class="table table-bordered display nowrap"
                                    cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Curso</th>
                                            <th>Asignatura</th>
                                            <th>Abreviatura</th>
                                            <th>Periodo</th>
                                            <th>Orden</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn bg-info text-white mt-2" id="saveC"><i
                                        class="fa fa-save"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var year = new Date().getFullYear();
        idPeriod.value = year;
</script>
@section('scripts')
<script src="{{asset('js/capacity.js')}}"></script>
@endsection
@endsection