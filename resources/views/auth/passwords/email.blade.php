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
            <form class="login-form" method="POST" action="{{ route('password.email') }}">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Restablecer</h3>

                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>

                @csrf

                <div class="row justify-content-center">
                    <div class="input-group mb-3 col-md-12">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                        </div>

                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Correo Electrónico">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8 align-content-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Restablecer Contraseña') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
