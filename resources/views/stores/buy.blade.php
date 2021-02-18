<!DOCTYPE html>
@extends('home')

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Comprar Producto</div>
                    <div class="card-body">
                        <form action="{{route ('stores.purchase', $store)}}" method="POST"
                        enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Seleccione Producto *</label>
                                <select name="id_product" class="test" required>
                                    @foreach ($products as $product)
                                        <option value="{{$product['id_product']}}">{{$product['product_name']}}</option>
                                    @endforeach
                                </select>
                                <div>
                                    <th class="test"></th>
                                </div>
                                <p></p>
                                <label>Precio a la venta *</label>
                                <input type="number" name="price_store" class="form-control" required placeholder="$100" step="50" min="100" max="500000">
                            </div>
                            <div class="form-group">
                                @csrf
                                <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                        <a href="{{route('stores.show', $store)}}" class="btn btn-primary btn-sm">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>