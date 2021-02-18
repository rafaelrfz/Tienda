@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if($errors->count() > 0)
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-header">
        <a href="{{route('countries.index')}}" class="btn btn-sm btn-primary float-left">Países</a>
        <a href="{{route('cities.index')}}" class="btn btn-sm btn-primary float-left">Ciudades</a>
        <a href="{{route('providers.index')}}" class="btn btn-sm btn-primary float-left">Proveedores</a>
        <a href="{{route('categories.index')}}" class="btn btn-sm btn-primary float-left">Categorías</a>
        <a href="{{route('products.index')}}" class="btn btn-sm btn-primary float-left">Productos</a>
        <a href="{{route('stores.index')}}" class="btn btn-sm btn-primary float-left">Tiendas</a>
    </div>
</div>
@endsection
