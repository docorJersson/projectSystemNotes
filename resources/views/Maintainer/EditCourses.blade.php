<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit" title="Edit">
  <i class="fa fa-edit fa-sm" aria-hidden="true"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-navy">
        <h5 class="modal-title" id="exampleModalLongTitle">EDITAR CURSO</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          @csrf
          <div class="row">
            <div class="col-md-12 col-sm-12  form-group">
              <label for="">Codigo*</label>
              <input type="text" name="codeCourse" class="form-control" value="" required>
            </div>

            <div class="col-md-12 col-sm-12 form-group">
              <label for="">Curso*</label>
              <input type="text" name="descriptionCourse" class="form-control" value="" required>
            </div>
            <div class="col-md-12 col-sm-12  form-group">
              <label for="">Grado*</label>
              <select id="heard" name="idGrade" class="form-control" required>
                <option value="">Choose..</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close">
                Cancelar</i></button>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"> Guardar</i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>