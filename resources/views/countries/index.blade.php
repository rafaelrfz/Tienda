@extends('home')
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            
                            <br>
                            Países
                            <a href="{{route('countries.create')}}" class="btn btn-sm btn-primary float-right">Insertar</a>
                        </div>
                        <div class="card-body">  
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>País</th>
                                        <th colspan="2">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td>{{$country->id_country}}</td>
                                            <td>{{$country->country_name}}</td>
                                            
                                            <td>
                                                <a href="{{route('countries.edit', $country->id_country)}}" class="btn btn-primary btn-sm">
                                                    Editar
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('countries.destroy', $country->id_country)}}" method="POST">
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