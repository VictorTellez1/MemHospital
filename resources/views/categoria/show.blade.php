@extends('layouts.app')

@section('content')
        <h1 class="text-center mb-4">{{$categoria->nombre}}</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-5">
                    <img src="/storage/{{$categoria->imagen}}" class="w-70 img-fluid">
                </div>
                <div class="col-md-6 mx-auto my-auto">
                    <p class="p-10 display-6" >{{$categoria->descripcion}}</p>
                </div>
            </div>
        </div>
        @foreach ($doctores as $doctor)
            <div class="container">
                <div class="row">
                <div class="col-12 col-md-6 col-xl-6 mx-auto">
                    <a class="d-flex flex-column align-items-end justify-content-between p-3 block" href="{{route('doctor.show',['doctor'=>$doctor->id])}}">
                    <div class="label">{{$doctor->nombre . " " . $doctor->apellido}}</div>
                    <div class="description">
                        <img src="/storage/{{$doctor->imagen}}" class="w-70 img-fluid" width="300" height="300">
                    </div>
                    </a>
                </div>
                </div>
            </div>
          @endforeach
@endsection
