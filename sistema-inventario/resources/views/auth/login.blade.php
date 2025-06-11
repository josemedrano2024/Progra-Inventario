@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="auth-card">
        <div class="auth-header">
            <h2 class="auth-title">Iniciar Sesión</h2>
            <p class="auth-subtitle">Accede a tu cuenta para gestionar el inventario</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-options">
                <div class="remember-me">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Recordarme</label>
                </div>
                
                    
            </div>

            <div class="form-actions">
                <button type="submit" class="auth-btn">
                    Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
