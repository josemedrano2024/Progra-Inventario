@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sistema de Inventario') }}</div>

                <div class="card-body">
                    <h1>Bienvenido al Sistema de Inventario</h1>
                    <p>Este es un sistema para gestionar inventarios de manera eficiente.</p>
                    <p>Por favor, inicie sesión o regístrese para continuar.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
