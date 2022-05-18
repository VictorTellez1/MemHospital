@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="text-uppercase mt-3 mb-3 text-center">Nuestras Especialidades</h2>
        <div class="owl-carousel owl-theme">
            @foreach ($categorias as $categoria)
            <div class="card">
                <img src="/storage/{{$categoria->imagen}}" class="card-img-top img-fluid" alt="imagen receta">
                <div class="card-body">
                    <h3>{{$categoria->nombre}}</h3>
                        <a href="{{route('categoria.show',['categoria'=>$categoria->slug])}}"
                        class="btn btn-primary d-block font-weigh-bold text-uppercase"
                        >Consultar Especialidad</a>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>


    <div class="container shadow p-3 mb-5 bg-white rounded m-10">
        <h2 class="text-uppercase mt-5 mb-3 text-center">Doctores del Hospital</h2>
        <div class="row">
            @foreach ($doctores as $doctor)
                <div class="col-md-3 mb-2">
                    <div class="card mt-3">
                        <img src="/storage/{{$doctor->imagen}}" class="card-img-top img-fluid" alt="imagen receta">
                        <div class="card-body">
                            <h3 class="text-center">{{$doctor->nombre}}</h3>
                            <h3 class="text-center">{{$doctor->apellido}}</h3>
                            <h5 class="font-size-3 text-center text-primary">{{$doctor->especialidad->nombre}}</h5>
                            <a href="{{route('doctor.show',['doctor'=>$doctor->id])}}"
                                class="btn btn-primary d-block font-weigh-bold text-uppercase"
                                >Consultar Doctor</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
