@extends('layouts.templeate')

@section('content')
<div class="container p-5">
  <div class="card card-outline card-info">
    <div class="card-header">
      <h3 class="card-title">Definición de Cursos por Grados</h3>
    </div>
    <div class="card-body">
      <div class="container">
        <div class="col-md-10 center-margin">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group col-md-12 col-sm-3">
                <div class="row">
                  <label for="" class="">NIVEL*</label>
                  <select name="idLevel" id="idLevel" class="form-control" required>
                    {{-- <option value="">Choose...</option> --}}
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
              <div class="form-group col-md-12 col-sm-3">
                <div class="row">
                  <label for="" class="">GRADOS*</label>
                  <select name="idGrade" id="idGrade" class="form-control">
                    <option value="">Choose...</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12">
              <table id="table-course-grade" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                <thead class="bg-info">
                  <th>CUSOS</th>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('js/coursesByGrades.js')}}"></script>
@endsection