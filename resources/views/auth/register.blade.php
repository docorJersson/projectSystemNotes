@extends('layouts.app')

@section('content')
<div class="section">
    <div class="container">
        <div class="user">
            <div class="user-form">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2>Sign Up</h2>
                    <div class="form-group row">
                        <label for="nameUser" class="col-12">{{ __('Name:') }}</label>

                        <div class="col-12">
                            <input id="nameUser" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="nameUser" value="{{ old('nameUser') }}" required autocomplete="name" autofocus>

                            @error('nameUser')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-12">{{ __('School:') }}</label>

                        <div class="col-12">
                            <input id="school" type="text" class="form-control @error('school') is-invalid @enderror"
                                name="school" value="{{ old('school') }}" required autocomplete="school" autofocus>

                            @error('school')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-12">{{ __('Password:') }}</label>

                        <div class="col-12">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-12">{{ __('Confirm Password:') }}</label>

                        <div class="col-12">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="idRole" class="col-12 col-md-2">{{ __('Role:') }}</label>

                        <div class="col-12 col-md-10">
                            <select name="idRole" id="role" class="form-control">
                                <option value="">-- Choose Role --</option>
                                @foreach ($roles as $role)
                                <option value="{{$role->idRole}}">{{$role->roleName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <p class="py-2 col-12">Already have an account ?
                            <a href="{{ route('login') }}">Sign In.</a>
                        </p>
                    </div>
                </form>
            </div>
            <div class="user-img"><img src="assets/img/2.jpg" alt="" /></div>
        </div>
    </div>
</div>
@endsection