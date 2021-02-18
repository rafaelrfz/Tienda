@extends('home')
    <body>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Ciudad</div>
    
                    <div class="card-body">
                        <form action="{{route('cities.update', $city->id_city)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nombre *</label>
                                <input type="text" name="city_name" class="form-control" required value="{{old('city_name', $city->city_name)}}">
                            </div>
                            <label>País</label>
                            <select name="id_country" id="">
                                @foreach ($countries as $country)
                                    <option value="{{$country['id_country']}}"
                                    @if ($country['id_country'] == old('id_country', $city->id_country))
                                        selected="selected"
                                    @endif>{{$country['country_name']}}</option>
                                @endforeach
                            </select>
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                        
                    </div>
                    <a href="{{route('cities.index')}}" class="btn btn-primary btn-sm">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>