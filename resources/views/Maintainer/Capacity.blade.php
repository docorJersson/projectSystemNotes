@extends('layouts.templeate')

@section('content')
<div class="container-fluid row">
    <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Mantenimiento de Asignaturas/Capacidades</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-8 center-margin">
                <form class="form-horizontal form-label-left">
                        <div class="row">
                            <div class="col-md-5 col-sm-12  form-group">
                                <label for="">Nivel*</label>
                                <select id="heard" name="idLevel" class="form-control" required>
                                    <option value="">Choose..</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 form-group">
                                <label for="">Periodo*</label>
                                <input type="text" name="idPeriod" class="form-control" required>
                            </div>
                            <div class="col-md-3 col-sm-12 form-group text-center">
                                <label for="">Con Capacidad*</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="materialUnchecked">
                                </div>
                            </div>
                        
                            <div class="col-md-6 col-sm-12  form-group">
                                <label for="">Grado*</label>
                                <select id="heard" name="idDegree" class="form-control" required>
                                    <option value="">Choose..</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12  form-group">
                                <label for="">Curso*</label>
                                <select id="heard" name="idCourse" class="form-control" required>
                                    <option value="">Choose..</option>
                                </select>
                            </div>

                            <div class="col-md-8 col-sm-12  form-group">
                               <div class="row">
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label for="">Asignatura/Capacidad*</label>
                                        <input type="text" name="descriptionCapacity" class="form-control" required>
                                     </div>  
                                    <div class="col-md-8 col-sm-12 form-group">
                                        <label for="">Abreviatura*</label>
                                        <input type="text" name="abbreviation" class="form-control" required>
                                    </div>    
                                    <div class="col-4"></div>
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="">Orden*</label>
                                        <input type="text" name="orderCapacity" class="form-control" required>
                                    </div>
                               </div>
                            </div>
                            <div class="col-1"></div>

                            <div class="col-md-2 col-sm-12 form-group">
                                <a class="btn btn-app bg-info text-white"><i class="fa fa-bars"></i> Mostrar</a>
                                <button class="btn btn-app bg-success text-white" type="submit"><i class="fa fa-save"></i> Grabar</button>
                            </div>
                        </div>
                </form>
                <table class="table table-bordered">
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