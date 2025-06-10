@extends('layouts.app')

@section('content')
<style>
    .register-container {
      
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: fadeInBg 1s ease;
       
    }
    @keyframes fadeInBg {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .register-card {
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        border-radius: 16px;
        background: #fff;
        padding: 2.5rem 2rem;
        width: 100%;
        max-width: 520px;
        margin: 2rem auto;
        transform: translateY(40px);
        opacity: 0;
        animation: cardDrop 0.8s cubic-bezier(.68,-0.55,.27,1.55) 0.2s forwards;
    }
    @keyframes cardDrop {
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    .register-card-header {
        font-size: 2rem;
        font-weight: 700;
        color: #0d6efd;
        text-align: center;
        margin-bottom: 1.5rem;
        letter-spacing: 1px;
        opacity: 0;
        animation: fadeInHeader 0.7s ease 0.7s forwards;
    }
    @keyframes fadeInHeader {
        to { opacity: 1; }
    }
    .form-label {
        font-weight: 600;
        color: #495057;
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.15);
        animation: inputFocus 0.3s;
    }
    @keyframes inputFocus {
        from { box-shadow: 0 0 0 0 rgba(13,110,253,0); }
        to { box-shadow: 0 0 0 0.2rem rgba(13,110,253,.15); }
    }
    .btn-primary {
        border-radius: 8px;
        padding: 0.5rem 2rem;
        font-weight: 600;
        font-size: 1.1rem;
        background: linear-gradient(90deg, #0d6efd 60%, #0dcaf0 100%);
        border: none;
        transition: background 0.2s, transform 0.15s;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, #0dcaf0 0%, #0d6efd 100%);
        transform: scale(1.04);
    }
    .invalid-feedback {
        font-size: 0.95rem;
    }
</style>
<div class="register-container">
    <div class="register-card">
        <div class="register-card-header">{{ __('Registro') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombres') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="apellidos" class="col-md-4 col-form-label text-md-end">{{ __('Apellidos') }}</label>
                    <div class="col-md-6">
                        <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos">
                        @error('apellidos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>
                    <div class="col-md-6">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required>
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="direccion" class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>
                    <div class="col-md-6">
                        <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}">
                        @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4 text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrarse') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection