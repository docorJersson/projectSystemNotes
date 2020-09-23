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
                        <label for="name" class="col-12">{{ __('Name') }}</label>

                        <div class="col-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-12">{{ __('E-Mail Address') }}</label>

                        <div class="col-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
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