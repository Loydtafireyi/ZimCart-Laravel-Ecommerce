@extends('layouts.frontend')

@section('content')

<div class="card col-lg col-xl-9 flex-row mx-auto px-0">
    <div class="img-left d-none d-md-flex"></div>

    <div class="card-body">
        <h4 class="title text-center mt-2 mb-3">Reset Password</h4>
        <form class="form-box px-3"method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-input">
                <span><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" placeholder="Email Address" tabindex="10" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                @error('email')
                    <span class="invalid-feedback mt-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-block">Send Password Reset Link</button>
            </div>

            <div class="text-center mb-3">
                or login with
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
                Don't have an account?
                <a href="{{ route('register') }}" class="register-link">Register Here</a>
            </div>
        </form>
    </div>
    
</div>
@endsection
