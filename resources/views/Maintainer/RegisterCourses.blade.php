<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Register" title="Register">
  <i class="fa fa-plus-square fa-lg" aria-hidden="true"> Nuevo Curso</i>
</button>
<!-- Modal -->
<div class="modal fade" id="Register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registrar Cursos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          @csrf
          <div class="row">

            <div class="col-md-12 col-sm-12  form-group">
              <label for="">Codigo*</label>
              <input type="text" name="codeCourse" class="form-control" required>
            </div>

            <div class="col-md-12 col-sm-12 form-group">
              <label for="">Curso*</label>
              <input type="text" name="descriptionCourse" class="form-control" required>
            </div>

            <div class="col-md-12 col-sm-12  form-group">
              <label for="">Nivel*</label>
              <select id="heard" name="idLevel" class="form-control" required>
                <option value="">Choose..</option>
              </select>
            </div>
            <div class="col-md-12 col-sm-12  form-group">
              <label for="">Grado*</label>
              <select id="heard" name="idDegree " class="form-control" required>
                <option value="">Choose..</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close">
              Cancelar</i></button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"> Guardar</i></button>
        </div>
      </form>
    </div>
  </div>
</div>