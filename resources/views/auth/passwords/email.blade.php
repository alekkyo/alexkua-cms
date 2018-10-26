@extends('layouts.auth')

@section('content')
    <h4>{{ __('Forgot your password?') }}</h4>
    <form method="POST" action="{{ route('password.email') }}">
        <div class="form-group">
            <label>{{ __('E-Mail address') }}</label>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">{{ __('Send Password Reset Link') }}</button>
        {!! csrf_field() !!}
    </form>
@endsection