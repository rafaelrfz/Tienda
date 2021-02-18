@extends('home')
    <body>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Producto de la tienda </div>
                        <br>
                        {{-- {{$store->store_name}} --}}
                    <div class="card-body">
                        <form action="{{route('stores.update_product', $purchase->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Seleccionar Producto *</label>
                                <select name="id_product" required>
                                    @foreach ($products as $product)
                                        <option value="{{$product['id_product']}}"
                                        @if ($product['id_product'] == old('id_product', $purchase->id_product))
                                            selected="selected"
                                        @endif>{{$product['product_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Precio *</label>
                                <input type="number" name="price_store" class="form-control" required placeholder="$100" step="50" min="100" max="500000" value="{{old('price_store', $purchase->price_store)}}">
                            </div>                            
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Actualizar Producto de tienda" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                    <a href="{{route('stores.show', $store->id_store)}}" class="btn btn-primary btn-sm">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>