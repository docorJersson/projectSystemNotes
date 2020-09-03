@extends('layouts.templeate')

@section('content')
<div class="box-title">
    <h1 class="title">¡Welcome <span class="upper">{{auth()->user()->nameUser}}</span>!</h1>
</div>
@endsection
