@extends('home')
    <body>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Tienda</div>
    
                    <div class="card-body">
                        <form action="{{route('stores.update', $store->id_store)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nombre *</label>
                                <input type="text" name="store_name" class="form-control" required value="{{old('store_name', $store->store_name)}}">
                            </div>
                            <div class="form-group">
                                <label>Ciudad *</label>
                                <select name="id_city" required>
                                    @foreach ($cities as $city)
                                        <option value="{{$city['id_city']}}"
                                        @if ($city['id_city'] == old('id_city', $store->id_city))
                                            selected="selected"
                                        @endif>{{$city['city_name']}}</option>
                                    @endforeach
                                </select>
                            </div>                            
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                    <a href="{{route('stores.index')}}" class="btn btn-primary btn-sm">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>