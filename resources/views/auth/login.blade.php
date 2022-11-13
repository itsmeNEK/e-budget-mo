@extends('layouts.guest')

@section('title', 'Login')
@section('content')
    <div class="container">

        <div class="row justify-content-center mt-5 bg-white">
            <div class="col-7 p-0">
                <img src="{{ asset('/storage/images/login.png') }}" class="img-fluid">
            </div>
            <div class="col-5 p-3">
                <h2 class="text-center text-uppercase my-5">{{ $login ?? "Login" }}</h2>
                <form method="POST" action="{{ route('login') }}" class="mt-5">
                    @csrf
                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
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

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
