<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8fafc;

        .card {
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            border-radius: 12px;
        }
        .card-header {
            background: #007bff;

            color: #fff;
            font-size: 1.2rem;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .font-weight-bold {
            color: #495057;
        }
        .badge-success {
            background: #28a745;
        }
        .badge-danger {
            background: #dc3545;
        }
        .btn-warning, .btn-danger, .btn-secondary {
            min-width: 100px;
        }
        .img-thumbnail {
            border-radius: 8px;
            border: 2px solid #dee2e6;
        }
        .row.mb-4 {
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #f1f1f1;
        }
        .row.mb-4:last-child {
            border-bottom: none;
        }
        .d-flex .btn {
            margin-right: 10px;
        }
        .d-flex .btn:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detalles del Producto</span>
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-secondary">Volver</a>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Código:</div>
                        <div class="col-md-8">{{ $product->code }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Nombre:</div>
                        <div class="col-md-8">{{ $product->name }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Descripción:</div>
                        <div class="col-md-8">{{ $product->description ?? 'N/A' }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Precio:</div>
                        <div class="col-md-8">${{ number_format($product->price, 2) }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Cantidad:</div>
                        <div class="col-md-8">{{ $product->quantity }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Categoría:</div>
                        <div class="col-md-8">{{ $product->category }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Proveedor:</div>
                        <div class="col-md-8">{{ $product->supplier ?? 'N/A' }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Fecha de Expiración:</div>
                        <div class="col-md-8">{{ $product->expiration_date ? $product->expiration_date->format('d/m/Y') : 'N/A' }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Estado:</div>
                        <div class="col-md-8">
                            <span class="badge badge-{{ $product->active ? 'success' : 'danger' }}">
                                {{ $product->active ? 'Activo' : 'Inactivo' }}
                            </span>
                        </div>
                    </div>

                    @if($product->image)
                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Imagen:</div>
                        <div class="col-md-8">
                            <img src="{{ asset('storage/'.$product->image) }}" alt="Imagen del producto" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    </div>
                    @endif

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning mr-2">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>