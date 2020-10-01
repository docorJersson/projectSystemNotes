@extends('layouts.templeate')

@section('content')
<div class="modal-content">
  <div class="modal-header bg-navy">
    <h5 class="modal-title" id="exampleModalLongTitle">EDITAR CURSO</h5>
  </div>
  <form action="{{URL::to('courses',$dt->idDetailTeacher)}}" method="post">
    @csrf
    @method('put')
    <div class="modal-body">
      <div class="card">
        <div class="card-body">
          <h5 class="text-secondary"><strong>Detalles del Curso</strong></h5>
          <hr>
          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Código</label>
            <input type="hidden" name="idCourse" value="{{$course->idCourse}}">
            <input type="text" name="codeCourse" class="form-control" value="{{$course->codeCourse}}" disabled>
          </div>
          <div class="col-md-8 col-sm-12 form-group">
            <label for="">Curso</label>
            <input type="text" name="descriptionCourse" class="form-control" value="{{$course->descriptionCourse}}"
              disabled>
          </div>

          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Nivel</label>
            <input type="hidden" id="idLevel" name="idLevel" value="{{$course->degree->level->idLevel}}">
            <input type="text" id="idDescriptionLevel" class="form-control"
              value="{{$course->degree->level->descriptionLevel}}" disabled>
          </div>
          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Grado</label>
            <input type="text" id="idGrade" name="idGrade" class="form-control"
              value="{{$course->degree->descriptionGrade}}" disabled>
          </div>
          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Sección</label>
            <input type="hidden" name="idSection" value="{{$dt->idSection}}">
            <input type="text" id="idSection" name="descriptionSection" class="form-control"
              value="{{$dt->sections->first()->descriptionSection}}" readonly>

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="text-secondary"><strong>Especificaciones</strong></h5>
          <hr>
          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Docente a Cargo</label>
            <input type="hidden" id="codeWorker" name="codeWorker" value="{{$course->teachers->first()->codeTeacher}}">
            <input type="text" id="nameWorker" name="nameWorker" class="form-control"
              value="{{$course->teachers->first()->worker->nameWorker." ". $course->teachers->first()->worker->lastNameWorker}}"
              required readonly>
            @include('Catedra.ListTeachers')
          </div>
          <div class="col-md-4 col-sm-12  form-group">
            <label for="">Periodo</label>
            <input type="hidden" name="idPeriod" value="{{$dt->periodYears->idPeriod}}">
            <input type="text" id="yearPeriod" class="form-control" value="{{$dt->periodYears->yearPeriod}}" disabled>
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
              <th id="ordenCapacity">Ordern de Evaluación</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($capacities as $capacity)
            <tr id="fila{{$capacity->idCapacity}}">
              <td class="d-none d-print-block" name=""><input type="hidden" name="idCapacity[]"
                  value="{{$capacity->idCapacity}}">{{$capacity->idCapacity}}
              </td>
              <td>{{$capacity->descriptionCapacity}}</td>
              <td>{{$capacity->abbreviation}}</td>
              <td><input type="hidden" name="orderCapacity[]"
                  value="{{$capacity->pivot->orderCapacity}}">{{$capacity->pivot->orderCapacity}}</td>
              <td>
                <a href="#" class="btn btn-danger btn-sm" onclick="quitar({{$capacity->idCapacity}})">
                  <i class="fas fa-minus-circle"></i>
                </a>
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