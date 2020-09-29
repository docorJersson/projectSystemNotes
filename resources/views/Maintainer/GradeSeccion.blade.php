@extends('layouts.templeate')

@section('content')
<div class="container p-5">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Mantenimiento de Grados y Secciones</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="col-md-10 center-margin">
                  <div class="row">
                    <div class="col-md-4 col-sm-12">
                      <div class="form-group col-md-12 col-sm-3">
                        <div class="row">
                            <label for="" class="">INICIAL*</label>
                                <select name="" id="" class="form-control select1">
                                    <option value=""></option>
                                 </select>
                        </div>
                      </div>
                      <div class="form-group col-md-12 col-sm-3">
                        <div class="row">
                            <label for="" class="">PRIMARIA*</label>
                            <select name="" id="" class="form-control select1">
                                <option value=""></option>
                              </select>
                        </div>
                      </div>
                      <div class="form-group col-md-12 col-sm-3">
                        <div class="row">
                            <label for="" class="">SECUNDARIA*</label>
                                <select name="" id="" class="form-control select1">
                                    <option value=""></option>
                                 </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                      <div class="form-group col-md-12 col-sm-3">
                        <div class="row">
                            <label for="" class="">GRADOS*</label>
                            <select name="" id="" class="form-control select1">
                              <option value=""></option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                      <table id="table-course-grade" class="table table-bordered display nowrap"cellspacing="0" width="100%">
                        <thead class="bg-info">
                            <th>Descripcion</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>B</td>
                            </tr>
                            <tr>
                                <td>C</td>
                            </tr>
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
