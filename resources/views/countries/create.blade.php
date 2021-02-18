@extends('home')
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Insertar País</div>

                        <div class="card-body">
                            <form action="{{route ('countries.store')}}" method="POST"
                            enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>País *</label>
                                    <input type="text" name="country_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    @csrf
                                    <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                                </div>
                            </form>
                            <a href="{{route('countries.index')}}" class="btn btn-primary btn-sm">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>