@extends('layouts.templeate')

@section('content')
<div class="container p-5">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Mantenimiento del Personal</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{route('personnel.update',$worker->codeWorker)}}" method="post">
                    <div class="modal-body text-left">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-sm-12 form-group">
                                <label for="">Codigo*</label>
                                <div class="row">
                                    <div class="col-md-8 input-group">
                                        <input type="text" name="codeWorker" class="form-control"
                                            value="{{$worker->codeWorker}}" disabled="disabled" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 form-group">
                                <label for="">Nombres*</label>
                                <input type="text" name="nameWorker" class="form-control" required
                                    value="{{$worker->nameWorker}}">
                            </div>
                            <div class="col-md-4 col-sm-12 form-group">
                                <label for="">Apellidos*</label>
                                <input type="text" name="lastNameWorker" class="form-control" required
                                    value="{{$worker->lastNameWorker}}">
                            </div>
                            <div class="col-md-3 col-sm-12  form-group">
                                <label for="">DNI*</label>
                                <input type="text" name="dniWorker" class="form-control" required
                                    value="{{$worker->dniWorker}}">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-md-8 col-sm-12  form-group">
                                <label for="">Dirección*</label>
                                <input type="text" name="addressWorker" class="form-control" required
                                    value="{{$worker->addressWorker}}">
                            </div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Estado Civil*</label>

                                <select id="heard" name="civilStatus" class="form-control" required>
                                    @if ($worker->civilStatus="Soltero(a)")
                                    <option value="{{$worker->civilStatus}}">{{$worker->civilStatus}}</option>
                                    <option value="casado(a)">casado(a)</option>
                                    <option value="viudo(a)">viudo(a)</option>
                                    <option value="divorciado(a)">divorciado(a)</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Teléfono*</label>
                                <input type="text" name="telephone" class="form-control" required
                                    value="{{$worker->telephone}}">
                            </div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Seguro Social*</label>
                                <select id="heard" name="socialSecurity" class="form-control" required>
                                    @if ($worker->socialSecurity="EsSalud")
                                    <option value="{{$worker->socialSecurity}}">{{$worker->socialSecurity}}</option>
                                    <option value="MINSA">MINSA</option>
                                    <option value="Privado">Privado</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-md-4 col-sm-12  form-group">
                                <label for="">Fecha de Ingreso*</label>
                                <input type="date" id="heard" name="dateWorker" class="form-control"
                                    value="{{$worker->dateWorker}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center form-group">
                            <a class="btn bg-secondary text-white" data-dismiss="modal"><i class="fa fa-reply"></i>
                                Cancelar</a>
                            <button class="btn bg-success text-white" type="submit"><i class="fa fa-save"></i>
                                Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection