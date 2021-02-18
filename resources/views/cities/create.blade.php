@extends('home')
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Insertar Ciudad</div>

                        <div class="card-body">
                            <form action="{{route ('cities.store')}}" method="POST"
                            enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Ciudad *</label>
                                    <input type="text" name="city_name" class="form-control" required>
                                    <label>Pais *</label>
                                    
                                    <select name="id_country" required>
                                        <option value="">Selecciona país</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country['id_country']}}">{{$country['country_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    @csrf
                                    <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                                </div>
                            </form>
                            <a href="{{route('cities.index')}}" class="btn btn-primary btn-sm">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>