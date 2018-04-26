@extends('layouts.auth')

@section('content')
    <h4>{{ __('Administrator Login') }}</h4>
    <form method="POST" action="{{ route('login') }}">
        <div class="form-group">
            <label>{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label>{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
            </label>
            <label class="pull-right">
                <label class="pull-right">
                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                </label>
            </label>

        </div>
        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">{{ __('Login') }}</button>
        <!--<div class="social-login-content">
            <div class="social-button">
                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
            </div>
        </div>
        <div class="register-link m-t-15 text-center">
            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
        </div>-->
    </form>
@endsection
