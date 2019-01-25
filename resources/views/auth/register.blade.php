@extends('layouts.app')

@section('content')
<section class="material-half-bg">
        <div class="cover"></div>
</section>
    <section class="login-content">
        <div class="logo">
            <h1 class="text-dark" style="text-shadow: 2px 2px 2px #333333FF;"><i class="fas fa-h-square"></i>&nbsp; Clínica</h1>
        </div>
        <div class="login-box rounded shadow-sm">
                    <form class="login-form" method="POST" action="{{ route('register') }}">
                        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Registro</h3>
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @elseif(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        @csrf

                        <!--<div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>

                            <div class="col-md-6">
                                <input id="user" type="text" class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }}" name="user" value="{{ old('user') }}" required autofocus>

                                @if ($errors->has('user'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->

                        <div class="row justify-content-center">
                            <div class="input-group mb-3 col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="row justify-content-center">
                            <div class="input-group mb-3 col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="input-group mb-3 col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Contraseña">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="input-group mb-3 col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repetir Contraseña">
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-7 text-left">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i> {{ __('Ya tengo una cuenta') }}
                                </a>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    </section>
@endsection
