@extends('layouts.templeate')
@section('content')

<div class="container-fluid">
    <div class="box-title">
        <h1 class="title text-dark">¡Welcome <span class="upper">{{auth()->user()->name}}</span>!</h1>
    </div>
    <div class="col-md-10 center-margin"> 
    <div class="row">
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">

              <h3>SN</h3>

              <p>GRADOS Y SECCIONES</p>
            </div>
            <div class="icon">
              <i class="fas fa-grip-horizontal"></i>
            </div>
            <a href="/grade_section" class="small-box-footer">IR <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6 img">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>SN<sup style="font-size: 20px"></sup></h3>

              <p>CURSOS POR GRADOS</p>
              
            </div>
            <div class="icon">
              <i class="fas fa-list-ol"></i>
            </div>
            <a href="/course_grade" class="small-box-footer">IR <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
  </div>
</div>


@endsection