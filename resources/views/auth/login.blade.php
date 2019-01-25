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
            <form class="login-form" method="POST" action="{{ route('login') }}">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Autenticación</h3>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
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

                        <div class="row justify-content-center">
                            <div class="input-group mb-3 col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                                </div>
                                <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo Electrónico" aria-label="Email" aria-describedby="basic-addon1" value="{{ old('email') }}" required autofocus>
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
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                </div>
                                <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon1" value="{{ old('password') }}" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row justify-content-center">
                                <div class="col-md-12 align-self-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordarme') }}
                                        </label>
                                    </div>

                                    <button type="submit" style="margin-top: 15px !important" class="btn btn-primary btn-block">
                                        {{ __('Ingresar') }}
                                    </button>

                                    
                                </div>

                                <div class="col-md-12">
                                    
                                    <a class="btn btn-link" style="margin: 15px 0 0 -15px !important" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus"></i> {{ __('Registrar nueva cuenta') }}
                                    </a>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" style="margin: -20px 0 0 -15px !important" href="{{ route('password.request') }}">
                                            <i class="fas fa-question"></i> {{ __('Olvidaste la contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                        </div>
            </form>
        </div>
    </section>
                
@endsection
