@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-5">Administra los doctores, las categorias y el hospital</h2>
    <div class="col-md-7 mx-auto bg-white p-3">
        <table class="table">
            <h3 class="text-center">Administrar Especialidades</h3>
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Nombre</th>
                    <th scole="col">Imagen</th>
                    <th scole="col">Acciones</th>
                </tr>
                <tbody>
                    @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->nombre}}</td>
                        <td><img src="/storage/{{$categoria->imagen}}" width="100" height="100"></td>
                        <td>
                            <eliminar-categoria
                                categoria-id={{$categoria->slug}}
                            ></eliminar-categoria>
                            <a href="{{route('categoria.edit',['categoria'=>$categoria->slug])}}" class="btn btn-dark mr-1 d-block">Editar</a>
                            <a href="{{route('categoria.show',['categoria'=>$categoria->slug])}}" class="btn btn-success mr-1 d-block">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                    <div class="mb-4 justify-content-end clear-fix">
                        <a href="{{route('categorias.create')}}" class="btn btn-danger mb-4 mr-1 d-inline">Crear nueva categoria</a>
                        @foreach ($hospitales as $hospital)
                        <a href="{{route('hospital.edit',['hospital'=>$hospital->id])}}" class="btn btn-dark mr-1">Editar Hospital</a>
                        @endforeach
                    </div>
                </tbody>
            </thead>
        </table>
    </div>

    <div class="col-md-7 mx-auto bg-white p-3">
        <table class="table">
            <h3 class="text-center">Administrar Doctores</h3>
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Nombre</th>
                    <th scole="col">Especialidad</th>
                    <th scole="col">Acciones</th>
                </tr>
                <tbody>
                    @foreach ($doctores as $doctor)
                    <tr>
                        <td>{{$doctor->nombre. " ".$doctor->apellido}}</td>
                        <td>{{$doctor->especialidad->nombre}}</td>
                        <td>
                            <eliminar-doctor
                                doctor-id={{$doctor->id}}
                            ></eliminar-doctor>
                            <a href="{{route('doctor.edit',['doctor'=>$doctor->id])}}" class="btn btn-dark mr-1 d-block mt-3">Editar</a>
                            <a href="{{route('doctor.show',['doctor'=>$doctor->id])}}" class="btn btn-success mr-1 d-block mt-3">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                    <div class="mb-4 justify-content-end">
                        <a href="{{route('doctores.create')}}" class="btn btn-danger mb-4 mr-1 d-inline">Crear nueva doctor</a>
                    </div>
                </tbody>
            </thead>
        <t/able>
    </div>
@endsection

