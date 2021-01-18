@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Login -->
                <div class="card-header">{{ __('messages.login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- E-Mail Address -->
                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('messages.e-mail-address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('messages.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <!-- Remember Me -->
                                <div class="form-check">
                                    <input class="form-check-input check-form" type="checkbox" name="remember"
                                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('messages.remember-me') }}
                                    </label>
                                </div>
                                <!-- Send -->
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">{{ __('messages.send') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Forgot Your Password? -->
                <div class="text-center">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('messages.forgot-your-password') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
