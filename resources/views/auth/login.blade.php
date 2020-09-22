@extends('layouts.app')

@section('content')
<div class="section">
    <div class="container">
        <div class="user">
            <div class="user-img"><img src="assets/img/3.jpg" alt="" /></div>
            <div class="user-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2>User In</h2>
                    <div class="form-group row">
                        <label for="email" class="col-3">{{ __('E-Mail Address') }}</label>

                        <div class="col-9">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-3">{{ __('Password') }}</label>

                        <div class="col-9">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

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