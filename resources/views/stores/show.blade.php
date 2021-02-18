@extends('home')
    
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <br>
                            {{$store->store_name}}
                            <a href="{{route('stores.buy', $store)}}" class="btn btn-sm btn-primary float-right">Comprar</a>
                            
                        </div>
        
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Productos comprados</th>
                                        <th>Precio comprado</th>
                                        <th>Precio a vender</th>
                                        <th>+IVA</th>
                                        <th>Precio Total</th>
                                        <th colspan="2">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                    <tr>
                                        <td>{{$purchase->id}}</td>
                                        <td>{{$purchase->product_name}}</td>
                                        <td>${{number_format( $purchase->provider_price, 0)}}</td>
                                        {{-- <td>${{ number_format($product->provider_price,0)}}</td> --}}
                                        <td>${{number_format($purchase->price_store, 0)}}</td>
                                        <td>19%</td>
                                        <td>${{number_format(($purchase->price_store * 0.19)+ $purchase->price_store, 0)}}</td>
                                        <td>
                                            <a href="{{route('stores.edit_product', [$purchase->id, $store->id_store])}}" class="btn btn-primary btn-sm">
                                                Editar
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('stores.delete', $purchase->id)}}" method="POST">
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
                            <a href="{{route('stores.index')}}" class="btn btn-sm btn-primary float-right">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>