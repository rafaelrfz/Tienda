<!DOCTYPE html>
@extends('home')

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Insertar Producto</div>
                    <div class="card-body">
                        <form action="{{route ('products.store')}}" method="POST"
                        enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Producto *</label>
                                <input type="text" name="product_name" class="form-control" required>
                                <label>Precio *</label>
                                <input type="number" name="provider_price" class="form-control" required placeholder="$100" step="50" min="100" max="500000">
                                <label>Categoría *</label>
                                <div>
                                    <select name="id_category" required>
                                        <option value="">Selecciona una categoría *</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category['id_category']}}">{{$category['category_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label>Proveedor *</label>
                                <div>
                                    <select name="id_provider" required>
                                        <option value="">Selecciona un proveedor</option>
                                        @foreach ($providers as $provider)
                                            <option value="{{$provider['id_provider']}}">{{$provider['provider_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                @csrf
                                <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                        <a href="{{route('products.index')}}" class="btn btn-primary btn-sm">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
