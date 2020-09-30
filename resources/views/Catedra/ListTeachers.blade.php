<button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#Teachers" title="Teachers"
  id="btnTeachers">
  <i class="fa fa-search-plus fa-sm" aria-hidden="true"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="Teachers" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Docentes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body table-responsive">
          <table id="table-teacher" class="table table-bordered table-hover nowrap" cellspacing="0" width="100%">
            <thead class="bg-warning">
              <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Año Escolar</th>
                {{-- <th>Opciones</th> --}}
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>