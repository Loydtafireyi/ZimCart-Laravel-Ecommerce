@extends('layouts.frontend')

<title>Register</title>
<meta charset="UTF-8">
<meta name="description" content="Login">
<meta name="keywords" content="login, sign">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@section('css')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')

<div class="card col-lg col-xl-9 flex-row mx-auto px-0">
    <div class="img-left d-none d-md-flex"></div>

    <div class="card-body">
        <h4 class="title text-center mt-2 mb-3">Create an account</h4>
        <form class="form-box px-3"method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-input">
                <span><i class="fa fa-user"></i></span>
                <input type="text" name="name" placeholder="Name" tabindex="10" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>

                @error('name')
                    <span class="invalid-feedback mt-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-input">
                <span><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" placeholder="Email Address" tabindex="10" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                @error('email')
                    <span class="invalid-feedback mt-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-input">
                <span><i class="fa fa-key"></i></span>
                <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                 @error('password')
                    <span class="invalid-feedback mt-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-input">
                <span><i class="fa fa-key"></i></span>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">

                 @error('password_confirmation')
                    <span class="invalid-feedback mt-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            @if(config('services.recaptcha.key'))
                <div class="form-group">
                    <div class="g-recaptcha"
                    data-sitekey="{{config('services.recaptcha.key')}}">
                    </div>
                    @error('g-recaptcha-response')
                        <span class="invalid-feedback mt-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @endif

            <div class="mb-3">
                <button type="submit" class="btn btn-block">Sign-up</button>
            </div>

            <div class="text-center mb-3">
                or register with
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <a href="/login/facebook" class="btn btn-block btn-social btn-facebook">Facebook</a>
                </div>
                <div class="col-6">
                    <a href="/login/google" class="btn btn-block btn-social btn-google">Google</a>
                </div>
            </div>

            <hr class="my-4"></hr>

            <div class="text-center mb-2">
                Already have an account?
                <a href="{{ route('login') }}" class="register-link">Login Here</a>
            </div>
        </form>
    </div>
    
</div>
@endsection
