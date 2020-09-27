<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editpersonnel{{$w->codeWorker}}"
    title="Editar">
    <i class="nav-icon fas fa-edit" aria-hidden="true"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="editpersonnel{{$w->codeWorker}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Personal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('personnel.update',$w->codeWorker)}}" method="post">
                <div class="modal-body text-left">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-12 form-group">
                            <label for="">Codigo*</label>
                            <div class="row">
                                <div class="col-md-8 input-group">
                                    <input type="text" name="codeWorker" class="form-control" value="{{$w->codeWorker}}"
                                        disabled="disabled" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 form-group">
                            <label for="">Nombres*</label>
                            <input type="text" name="nameWorker" class="form-control" required
                                value="{{$w->nameWorker}}">
                        </div>
                        <div class="col-md-4 col-sm-12 form-group">
                            <label for="">Apellidos*</label>
                            <input type="text" name="lastNameWorker" class="form-control" required
                                value="{{$w->lastNameWorker}}">
                        </div>
                        <div class="col-md-3 col-sm-12  form-group">
                            <label for="">DNI*</label>
                            <input type="text" name="dniWorker" class="form-control" required value="{{$w->dniWorker}}">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-md-8 col-sm-12  form-group">
                            <label for="">Dirección*</label>
                            <input type="text" name="addressWorker" class="form-control" required
                                value="{{$w->addressWorker}}">
                        </div>
                        <div class="col-md-4 col-sm-12  form-group">
                            <label for="">Estado Civil*</label>
                            {{--  <input type="text" name="civilStatus" class="form-control" required
                                value="{{$w->civilStatus}}"> --}}
                            <select id="heard" name="civilStatus" class="form-control" required>
                                @if ($w->civilStatus="Soltero(a)")
                                <option value="{{$w->civilStatus}}">{{$w->civilStatus}}</option>
                                <option value="casado(a)">casado(a)</option>
                                <option value="viudo(a)">viudo(a)</option>
                                <option value="divorciado(a)">divorciado(a)</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12  form-group">
                            <label for="">Teléfono*</label>
                            <input type="text" name="telephone" class="form-control" required value="{{$w->telephone}}">
                        </div>
                        <div class="col-md-4 col-sm-12  form-group">
                            <label for="">Seguro Social*</label>
                            <select id="heard" name="socialSecurity" class="form-control" required>
                                @if ($w->socialSecurity="EsSalud")
                                <option value="{{$w->socialSecurity}}">{{$w->socialSecurity}}</option>
                                <option value="MINSA">MINSA</option>
                                <option value="Privado">Privado</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-md-4 col-sm-12  form-group">
                            <label for="">Fecha de Ingreso*</label>
                            <input type="date" id="heard" name="dateWorker" class="form-control"
                                value="{{$w->dateWorker}}" disabled>
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