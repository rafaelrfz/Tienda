<!DOCTYPE html>
@extends('home')

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Insertar Proveedor</div>
                    <div class="card-body">
                        <form action="{{route ('providers.store')}}" method="POST"
                        enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Proveedor *</label>
                                <input type="text" name="provider_name" class="form-control" required>
                                <label>Ciudad *</label>
                                <select name="id_city" required>
                                    <option value="">Selecciona la ciudad</option>
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
                        <a href="{{route('providers.index')}}" class="btn btn-primary btn-sm">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
