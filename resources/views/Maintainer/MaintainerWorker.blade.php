@extends('layouts.templeate')

@section('content')
<div class="container p-5">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Mantenimiento del Personal</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="col-md-10 center-margin">
                    <form class="form-horizontal form-label-left" style="font-family: Arial, Helvetica, sans-serif;color:black">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 form-group">
                                <label for="">Codigo*</label>
                                <div class="row">
                                    <div class="col-md-8 input-group">
                                        <input type="text" name="codeWorker" class="form-control" required>
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
                        </div><hr>
                        
                        <div class="row">
                            <div class="col-md-12 text-center form-group">
                                <a class="btn bg-secondary text-white"><i class="fa fa-reply"></i> Cancelar</a>
                                <button class="btn bg-success text-white" type="submit"><i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection