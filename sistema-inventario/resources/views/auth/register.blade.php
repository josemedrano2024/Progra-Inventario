@extends('layouts.app')

@section('content')
<div class="auth-container-wide">
    <div class="auth-card-wide">
        <div class="auth-header-wide">
            <h2 class="auth-title">Registro</h2>
        </div>

        <form method="POST" action="{{ route('register') }}" class="auth-form-wide">
            @csrf

            <div class="form-grid">
                <!-- Fila 1 -->
                <div class="form-group-wide">
                    <label for="name" class="form-label">Nombres</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>

                <div class="form-group-wide">
                    <label for="lastname" class="form-label">Apellidos</label>
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" 
                           name="lastname" value="{{ old('lastname') }}" required>
                </div>

                <!-- Fila 2 -->
                <div class="form-group-wide">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group-wide">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" 
                           name="phone" value="{{ old('phone') }}" required>
                </div>

                <!-- Fila 3 -->
                <div class="form-group-wide">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" required autocomplete="new-password">
                </div>

                <div class="form-group-wide">
                    <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" class="form-control" 
                           name="password_confirmation" required>
                </div>

                <!-- Fila 4 -->
                <div class="form-group-wide full-width">
                    <label for="address" class="form-label">Dirección</label>
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" 
                           name="address" value="{{ old('address') }}" required>
                </div>
            </div>

            <div class="form-actions-wide">
                <button type="submit" class="auth-btn-wide">
                    Registrarse
                </button>
            </div>
        </form>
    </div>
</div>
@endsection