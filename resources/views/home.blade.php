@extends('layouts.templeate')
@section('content')

<div class="row">
    <div class="box-title">
    <h1 class="title text-dark">¡Welcome <span class="upper">{{auth()->user()->nameUser}}</span>!</h1>
</div>
   

@endsection
