@extends('home')
    <body>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Producto</div>
    
                    <div class="card-body">
                        <form action="{{route('products.update', $product->id_product)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nombre *</label>
                                <input type="text" name="product_name" class="form-control" required value="{{old('provider_name', $product->product_name)}}">
                            </div>
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="number" name="provider_price" class="form-control" required value="{{old('provider_price', $product->provider_price)}}" placeholder="$100" step="50" min="100" max="500000">
                            </div>
                            <div class="form-group">
                                <label>Categoría *</label>
                                <select name="id_category" required>
                                    @foreach ($categories as $category)
                                        <option value="{{$category['id_category']}}" 
                                        @if ($category['id_category'] == old('id_category', $product->id_category))
                                            selected="selected"
                                        @endif>{{$category['category_name']}}</option>
                                    @endforeach
                                </select>
                            </div>                        
                            <div class="form-group">
                                <label>Proveedor *</label>
                                <select name="id_provider" required>
                                    @foreach ($providers as $provider)
                                        <option value="{{$provider['id_provider']}}" 
                                        @if ($provider['id_provider'] == old('id_provider', $product->id_provider))
                                            selected="selected"
                                        @endif>{{$provider['provider_name']}}</option>
                                    @endforeach
                                </select>
                            </div>    
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                    <a href="{{route('products.index')}}" class="btn btn-primary btn-sm">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>