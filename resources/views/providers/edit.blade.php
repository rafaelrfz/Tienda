@extends('home')
    <body>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Proveedor</div>
    
                    <div class="card-body">
                        <form action="{{route('providers.update', $provider->id_provider)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nombre *</label>
                                <input type="text" name="provider_name" class="form-control" required value="{{old('provider_name', $provider->provider_name)}}">
                            </div>
                            <div class="form-group">
                                <label>Ciudad *</label>
                                <select name="id_city" required>
                                    @foreach ($cities as $city)
                                        <option value="{{$city['id_city']}}"
                                        @if ($city['id_city'] == old('id_city', $provider->id_city))
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
                    <a href="{{route('providers.index')}}" class="btn btn-primary btn-sm">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>