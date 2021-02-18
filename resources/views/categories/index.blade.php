@extends('home')
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            
                            <br>
                            Categorías
                            <a href="{{route('categories.create')}}" class="btn btn-sm btn-primary float-right">Insertar</a>
                        </div>
        
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Categoría</th>
                                        <th colspan="2">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{$category->id_category}}</td>
                                            <td>{{$category->category_name}}</td>
                                            
                                            <td>
                                                <a href="{{route('categories.edit', $category->id_category)}}" class="btn btn-primary btn-sm">
                                                    Editar
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('categories.destroy', $category->id_category)}}" method="POST">
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