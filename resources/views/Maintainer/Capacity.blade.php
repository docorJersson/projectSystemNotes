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
                    <form class="form-horizontal form-label-left" style="font-family: Arial;color:black">
                        <div class="row">
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Nivel*</label>
                                <select id="heard" name="idLevel" class="form-control" required>
                                    <option value="">Choose..</option>
                                </select>
                            </div>
                            <!--div class="col-md-3 col-sm-12 form-group text-center">
                                <label for="">Con Capacidad*</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="materialUnchecked">
                                </div>
                            </div-->
                        
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Grado*</label>
                                <select id="idGrade" name="idGrade" class="form-control" required>
                                    <option value="">Choose..</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-12 form-group">
                                <label for="">Periodo*</label>
                                <input type="text" name="idPeriod" class="form-control" required>
                            </div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Curso*</label>
                                <select id="heard" name="idCourse" class="form-control" required>
                                    <option value="">Choose..</option>
                                </select>
                            </div>
                            <div class="col-md-8 col-sm-12 form-group">
                                <label for="">Asignatura/Capacidad*</label>
                                <input type="text" name="descriptionCapacity" class="form-control" required>
                            </div>  
                                   
                            <div class="col-md-4 col-sm-12 form-group">
                                <label for="">Abreviatura*</label>
                                <input type="text" name="abbreviation" class="form-control" required>
                            </div>    
                            <div class="col-md-3 col-sm-12 form-group">
                                <label for="">Orden*</label>
                                <input type="text" name="orderCapacity" class="form-control" required>
                            </div>
                            <div class="col-1"></div>

                            <div class="col-md-4 col-sm-12 form-group p-4 text-center">
                                <a class="btn bg-info text-white"><i class="fa fa-bars"></i> Mostrar</a>
                                <button class="btn bg-success text-white" type="submit"><i class="fa fa-save"></i> Grabar</button>
                            </div>
                        </div>
                </form>
                <table id="table-capacity" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Descripción</th>
                            <th>Abreviatura</th>
                            <th>Orden</th>
                        </tr>
                    </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                          </tr>
                    </tbody>
                </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
