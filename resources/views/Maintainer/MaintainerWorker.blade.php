@extends('layouts.templeate')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Mantenimiento del Personal</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-8 center-margin">
                <form class="form-horizontal form-label-left">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 form-group">
                                <label for="">Codigo*</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" name="codeWorker" class="form-control" required>
                                    </div>
                                    <div class="col-md-1">
                                        @include('Maintainer.ListWorkers')
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 form-group">
                                <label for="">Apellidos*</label>
                                <input type="text" name="lastNameWorker" class="form-control" required>
                            </div>

                            <div class="col-md-4 col-sm-12 form-group">
                                <label for="">Nombres*</label>
                                <input type="text" name="nameWorker" class="form-control" required>
                            </div>

                            <div class="col-md-3 col-sm-12  form-group">
                                <label for="">DNI*</label>
                                <input type="text" name="dniWorker" class="form-control" required>
                            </div>

                            <div class="col-1"></div>

                            <div class="col-md-8 col-sm-12  form-group">
                                <label for="">Dirección*</label>
                                <input type="text" name="addressWorker" class="form-control" required>
                            </div>

                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Estado Civil*</label>
                                <select id="heard" name="civilStatus" class="form-control" required>
                                    <option value="">Choose..</option>
                                </select>
                            </div>

                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Teléfono*</label>
                                <input type="text" name="telephone" class="form-control" required>
                            </div>

                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Seguro Social*</label>
                                <input type="text" name="socialSecurity" class="form-control" required>
                            </div>

                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Departamento*</label>
                                <select id="heard" name="flatWorker" class="form-control" required>
                                    <option value="">Choose..</option>
                                </select>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Fecha de Ingreso*</label>
                                <select id="heard" name="dateWorker" class="form-control" required>
                                    <option value="">Choose..</option>
                                </select>
                            </div>
                        
                        <hr>
                        <div class="col-md-12 col-sm-12 form-group">
                            <div class="row">
                                <div class="col-md-6 center-margin">
                                    <a class="btn btn-app bg-secondary text-white"><i class="fa fa-reply"></i> Cancelar</a>
                                   
                                    <button class="btn btn-app bg-success text-white" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection