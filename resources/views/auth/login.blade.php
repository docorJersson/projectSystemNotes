@extends('layouts.app')

@section('content')
<div class="section">
    <div class="container">
        <div class="user">
            <div class="user-img"><img src="assets/img/3.jpg" alt=""/></div>
            <div class="user-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2>User In</h2>
                    <div class="form-group row">
                        <label for="name" class="col-3">{{ __('User') }}</label>

                        <div class="col-9">
                            <input id="name" type="text" class="form-control @error('nameUser') is-invalid @enderror" name="nameUser" value="{{ old('nameUser') }}" required autocomplete="on" autofocus>

                            @error('nameUser')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="school" class="col-3">{{ __('School') }}</label>

                        <div class="col-9">
                            <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="{{ old('school') }}" required autocomplete="school" autofocus>

                            @error('school')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-3">{{ __('Password') }}</label>

                        <div class="col-9">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role" class="col-3">{{ __('Role') }}</label>

                        <div class="col-9">
                            <select name="idRole" id="role" class="form-control">
                                <option value="">-- Choose Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{$role->idRole}}">{{$role->roleName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <p class="py-2 col-12">Do not have an account ? 
                            <a href="{{ route('register') }}">Sign Up.</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
