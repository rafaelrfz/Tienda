@extends('home')
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            
                            <br>
                            Ciudades
                            <a href="{{route('cities.create')}}" class="btn btn-sm btn-primary float-right">Insertar</a>
                            
                        </div>
        
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ciudad</th>
                                        <th>País</th>
                                        <th colspan="2">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cities as $city)
                                        <tr>
                                            <td>{{$city->id_city}}</td>
                                            <td>{{$city->city_name}}</td>
                                            <td>{{$city->country_name}}</td>
                                            <td>
                                                <a href="{{route('cities.edit', $city->id_city)}}" class="btn btn-primary btn-sm">
                                                    Editar
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('cities.destroy', $city->id_city)}}" method="POST">
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