<!DOCTYPE html>
@extends('home')

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Tienda</div>
                    <div class="card-body">
                        <form action="{{route ('stores.store')}}" method="POST"
                        enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nombre Tienda *</label>
                                <input type="text" name="store_name" class="form-control" required>
                                <label>Ciudad *</label>
                                <select name="id_city" required>
                                    <option value="">Seleccione una ciudad</option>
                                    @foreach ($cities as $city)
                                        <option value="{{$city['id_city']}}">{{$city['city_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                @csrf
                                <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                        <a href="{{route('stores.index')}}" class="btn btn-primary btn-sm">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
