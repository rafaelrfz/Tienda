@extends('home')
    <body>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Categoría</div>
    
                    <div class="card-body">
                        <form action="{{route('categories.update', $category->id_category)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nombre *</label>
                                <input type="text" name="category_name" class="form-control" required value="{{old('category_name', $category->category_name)}}">
                            </div>
                            
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                        <a href="{{route('categories.index')}}" class="btn btn-primary btn-sm">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>