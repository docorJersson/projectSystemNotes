<button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#Teachers" title="Teachers">
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
        <div class="modal-body">
          <table id="table-teacher" class="table table-bordered display nowrap" cellspacing="0" width="100%">
            <thead class="bg-warning">
              <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Año Escolar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>2020</td>
                <td>2020</td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>