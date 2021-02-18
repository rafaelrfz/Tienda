@extends('home')
    
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <br>
                            Productos
                            <a href="{{route('products.create')}}" class="btn btn-sm btn-primary float-right">Insertar</a>
                            
                        </div>
        
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Categoría</th>
                                        <th>Proveedor</th>
                                        <th>Precio</th>
                                        <th colspan="2">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{$product->id_product}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->category_name}}</td>
                                            <td>{{$product->provider_name}}</td>
                                            <td>${{ number_format($product->provider_price,0)}}</td>
                                            {{-- <td>${{$product->provider_price}}</td> --}}
                                            <td>
                                                <a href="{{route('products.edit', $product->id_product)}}" class="btn btn-primary btn-sm">
                                                    Editar
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('products.destroy', $product->id_product)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input 
                                                        type="submit" 
                                                        value="Eliminar" 
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('¿Desea eliminar...?')">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>