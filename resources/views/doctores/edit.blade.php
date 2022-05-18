@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center mt-4">Registrar Doctor</h1>
        <div class="mt-5 row justify-content-center">
            <form
                class="col-md-9 col-xs-12 card card-body"
                action="{{route('doctor.update',['doctor'=>$doctor->id])}}"
                method="POST"
                enctype="multipart/form-data"
            >
            @csrf
            @method("PUT");
                <fieldset class="border p-4">
                    <legend class="text-primary">Informacion del Doctor</legend>
                    <div class="form-group">
                        <label for="nombre">Nombre del Doctor</label>
                        <input
                            type="text"
                            id="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="Nombre"
                            value="{{$doctor->nombre}}"
                            name="nombre"
                        >
                        @error('nombre')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido del Doctor</label>
                        <input
                            type="text"
                            id="apellido"
                            class="form-control @error('apellido') is-invalid @enderror"
                            placeholder="Apellido"
                            value="{{$doctor->apellido}}"
                            name="apellido"
                        >
                        @error('apellido')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono del Doctor</label>
                        <input
                            type="text"
                            id="telefono"
                            class="form-control @error('apellido') is-invalid @enderror"
                            placeholder="Telefono"
                            value="{{$doctor->telefono}}"
                            name="telefono"
                        >
                        @error('telefono')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label class="mt-4" for="categoria_id">Categoria</label>
                        <select
                            class="form-control @error('categoria_id') is-invalid @enderror"
                            name="categoria_id"
                            id="categoria_id"
                            name="categoria_id"
                        >
                        <option value="" selected disabled>--Seleccione--</option>
                            @foreach ($categorias as $categoria)
                                <option
                                {{$doctor->categoria_id===$categoria->id ? 'selected' : ''}}
                                value="{{$categoria->id}}"
                                >{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen principal del Doctor</label>
                        <input
                            type="file"
                            id="imagen"
                            class="form-control @error('imagen') is-invalid @enderror"
                            name="imagen"
                        >
                        <div class="mt-4">
                            <p>Imagen actual:</p>
                            <img src="/storage/{{$doctor->imagen}}" style="width: 300px">
                        </div>
                        @error('imagen')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>

                </fieldset>
                <input type="submit" class="btn btn-primary mt-3 d-block" value="Registrar Doctor">
            </form>
        </div>


    </div>
@endsection
