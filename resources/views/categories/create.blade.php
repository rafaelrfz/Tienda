@extends('home')
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Insertar Categoría</div>

                        <div class="card-body">
                            <form action="{{route ('categories.store')}}" method="POST"
                            enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nombre Categoría *</label>
                                    <input type="text" name="category_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    @csrf
                                    <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                                </div>
                            </form>
                            <a href="{{route('categories.index')}}" class="btn btn-primary btn-sm">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>