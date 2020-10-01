<button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#courseTeachers"
    title="courseTeachers" id="btnCourseTeachers">
    <i class="fa fa-bars fa-sm" aria-hidden="true"></i> Mostrar
</button>
<!-- Modal -->
<div class="modal fade" id="courseTeachers" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Coursos de los Profesores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body table-responsive">
                    <table id="tCourses" class="table table-bordered table-hover nowrap" cellspacing="0" width="100%">
                        <thead class="bg-warning">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Curso</th>
                                <th>Grado</th>
                                <th>Sección</th>
                                <th>Bimestre</th>
                                <th>Año</th>
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