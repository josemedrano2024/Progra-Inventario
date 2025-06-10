<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Producto</div>

                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Código -->
    <div class="form-group row">
        <label for="code" class="col-md-4 col-form-label text-md-right">Código</label>
        <div class="col-md-6">
            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code', $product->code) }}" required>
            @error('code') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
        </div>
    </div>

    <!-- Nombre -->
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
        </div>
    </div>

    <!-- Descripción -->
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>
        <div class="col-md-6">
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description', $product->description) }}</textarea>
            @error('description') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
        </div>
    </div>

    <!-- Precio -->
    <div class="form-group row">
        <label for="price" class="col-md-4 col-form-label text-md-right">Precio</label>
        <div class="col-md-6">
            <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $product->price) }}" required>
            @error('price') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
        </div>
    </div>

    <!-- Cantidad -->
    <div class="form-group row">
        <label for="quantity" class="col-md-4 col-form-label text-md-right">Cantidad</label>
        <div class="col-md-6">
            <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity', $product->quantity) }}" required>
            @error('quantity') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
        </div>
    </div>

    <!-- Categoría -->
    <div class="form-group row">
        <label for="category" class="col-md-4 col-form-label text-md-right">Categoría</label>
        <div class="col-md-6">
            <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category', $product->category) }}" required>
            @error('category') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
        </div>
    </div>

    <!-- Proveedor -->
    <div class="form-group row">
        <label for="supplier" class="col-md-4 col-form-label text-md-right">Proveedor</label>
        <div class="col-md-6">
            <input id="supplier" type="text" class="form-control @error('supplier') is-invalid @enderror" name="supplier" value="{{ old('supplier', $product->supplier) }}">
            @error('supplier') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
        </div>
    </div>

    <!-- Fecha de expiración -->
    <div class="form-group row">
        <label for="expiration_date" class="col-md-4 col-form-label text-md-right">Fecha de Expiración</label>
        <div class="col-md-6">
            <input id="expiration_date" type="date" class="form-control @error('expiration_date') is-invalid @enderror" name="expiration_date" value="{{ old('expiration_date', optional($product->expiration_date)->format('Y-m-d')) }}">
            @error('expiration_date') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
        </div>
    </div>

    <!-- Estado activo -->
    <div class="form-group row">
        <label for="active" class="col-md-4 col-form-label text-md-right">Activo</label>
        <div class="col-md-6">
            <select id="active" name="active" class="form-control @error('active') is-invalid @enderror">
                <option value="1" {{ old('active', $product->active) ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('active', $product->active) == 0 ? 'selected' : '' }}>No</option>
            </select>
            @error('active') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
        </div>
    </div>

    <!-- Imagen actual -->
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Imagen actual</label>
        <div class="col-md-6">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" class="img-thumbnail" style="max-width: 200px;">
            @else
                <p>No hay imagen</p>
            @endif
        </div>
    </div>

    <!-- Nueva imagen -->
    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">Nueva Imagen</label>
        <div class="col-md-6">
            <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">
            @error('image') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
        </div>
    </div>

    <!-- Botones -->
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</form>


            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
<style>
            body {
                    background: #f8fafc;
            }
            .card {
                    margin-top: 40px;
                    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                    border-radius: 16px;
                    border: none;
            }
            .card-header {
                    background: linear-gradient(90deg, #007bff 60%, #0056b3 100%);
                    color: #fff;
                    font-weight: bold;
                    letter-spacing: 1px;
                    font-size: 1.3rem;
                    border-top-left-radius: 16px;
                    border-top-right-radius: 16px;
                    text-align: center;
            }
            .card, .container, .row, .col-md-8, .col-md-6, .form-group, .form-group.row, .form-group.row.mb-0 {
                    text-align: center;
            }
            .btn-primary {
                    background: #007bff;
                    border: none;
                    border-radius: 8px;
                    font-weight: 500;
                    transition: background 0.2s;
            }
            .btn-primary:hover {
                    background: #0056b3;
            }
            .btn-secondary {
                    margin-left: 10px;
                    border-radius: 8px;
                    font-weight: 500;
            }
            .img-thumbnail {
                    margin-top: 10px;
                    border-radius: 8px;
                    border: 2px solid #007bff;
                    box-shadow: 0 2px 8px rgba(0,123,255,0.08);
            }
            label {
                    font-weight: 500;
                    color: #0056b3;
            }
            .form-control:focus, .form-control-file:focus {
                    border-color: #007bff;
                    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
            }
            .form-group {
                    margin-bottom: 1.5rem;
            }
            .form-control, .form-control-file {
                    border-radius: 8px;
            }
            .invalid-feedback {
                    font-size: 0.95em;
            }
            .container {
                    padding-bottom: 40px;
            }
            @media (max-width: 576px) {
                    .card {
                            margin-top: 20px;
                    }
                    .card-header {
                            font-size: 1.1rem;
                    }
            }
    </style>