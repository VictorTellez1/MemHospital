@extends('layouts.app')
@section('content')
        <h1 class="text-center mb-4">{{$doctor->nombre . " ".$doctor->apellido}}</h1>
        <div class="container ">
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <div class="col-md-6 p-5 mx-auto">
                    <img src="/storage/{{$doctor->imagen}}" class="w-70 img-fluid">
                </div>
                <div class="col-md-6 mx-auto my-auto text-center ">
                    <H2 class="text-center text-md">Informacion del doctor: </H2>
                    <p  class="text-center font-weight-bold">Telefono <span class="font-weight-bold text-primary">{{$doctor->telefono}}</span></p>
                    <a class="text-dark text-primary" href="{{route('categoria.show',['categoria'=>$doctor->especialidad->slug])}}">
                        {{$doctor->especialidad->nombre}}
                    </a>
                </div>
            </div>
        </div>
@endsection
