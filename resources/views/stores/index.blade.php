@extends('home')
    
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <br>
                            Tiendas
                            <a href="{{route('stores.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
                            
                        </div>
        
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tienda</th>
                                        <th>Ciudad</th>
                                        <th colspan="2">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stores as $store)
                                        <tr>
                                            <td>{{$store->id_store}}</td>
                                            <td>{{$store->store_name}}</td>
                                            <td>{{$store->city_name}}</td>
                                            <td>
                                                <a href="{{route('stores.show', $store->id_store)}}" class="btn btn-secondary btn-sm">
                                                    Ver Inventario
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('stores.edit', $store->id_store)}}" class="btn btn-primary btn-sm">
                                                    Editar
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('stores.destroy', $store->id_store)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input 
                                                        type="submit" 
                                                        value="Eliminar" 
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('¿Desea eliminar...?')">
                                                </form>
                                            </td>
                                            <td>
                                                
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