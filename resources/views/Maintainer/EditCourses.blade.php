@extends('layouts.templeate')

@section('content')
<div class="modal-content">
  <div class="modal-header bg-navy">
    <h5 class="modal-title" id="exampleModalLongTitle">EDITAR CURSO</h5>
  </div>
  <form action="" method="post">
    <div class="modal-body">
      @csrf
      <div class="card">
        <div class="card-body">
          <h5 class="text-secondary"><strong>Detalles del Curso</strong></h5>
          <hr>
          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Código</label>
            <input type="text" name="codeCourse" class="form-control" value="{{$course->codeCourse}}" disabled>
          </div>
          <div class="col-md-8 col-sm-12 form-group">
            <label for="">Curso</label>
            <input type="text" name="descriptionCourse" class="form-control" value="{{$course->descriptionCourse}}"
              disabled>
          </div>

          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Nivel</label>
            <input type="hidden" id="idLevel" value="{{$course->degree->level->idLevel}}">
            <input type="text" id="idDescriptionLevel" name="idLevel" class="form-control"
              value="{{$course->degree->level->descriptionLevel}}" disabled>
          </div>
          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Grado</label>
            <input type="text" id="idGrade" name="idGrade" class="form-control"
              value="{{$course->degree->descriptionGrade}}" disabled>
          </div>
          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Sección</label>
            <input type="text" id="idSection" name="idSection" class="form-control"
              value="{{$dt->sections->first()->descriptionSection}}" disabled>

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="text-secondary"><strong>Especificaciones</strong></h5>
          <hr>
          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Docente a Cargo</label>
            <input type="text" id="idTeacher" name="idTeacher" class="form-control"
              value="{{$course->teachers->first()->worker->nameWorker." ". $course->teachers->first()->worker->lastNameWorker}}"
              required>
          </div>
          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Periodo</label>
            <input type="text" class="form-control" value="{{$dt->periodYears->yearPeriod}}" disabled>
          </div>
          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Bimestre</label>
            <input type="text" class="form-control" value="{{$dt->periodYears->bimester}}" disabled>
          </div>
        </div>
      </div>

      <div class="table-responsive ">
        <div class="d-flex justify-content-end">
          @include('Maintainer.listCapacity')
        </div>
        <table class="table table-bordered nowrap" id="tableCapacities" cellspacing="0" width="100%">
          <thead class="bg-dark">
            <tr>
              <th class="d-none d-print-block">idCapacity</th>
              <th>Capacidad</th>
              <th>Objetivos</th>
              <th>Ordern de Evaluación</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($capacities as $capacity)
            <tr>
              <td class="d-none d-print-block">{{$capacity->idCapacity}}</td>
              <td>{{$capacity->descriptionCapacity}}</td>
              <td>{{$capacity->abbreviation}}</td>
              <td>{{$capacity->pivot->orderCapacity}}</td>
              <td>
                <a href="">Borrar</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close">
            Cancelar</i></button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"> Guardar</i></button>
      </div>
  </form>
</div>

@endsection