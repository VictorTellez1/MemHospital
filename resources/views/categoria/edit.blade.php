@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center mt-4">Registrar Especialidad</h1>
        <div class="mt-5 row justify-content-center">
            <form
                class="col-md-9 col-xs-12 card card-body"
                action="{{route('categoria.update',['categoria'=>$categoria->slug])}}"
                method="POST"
                enctype="multipart/form-data"
            >
            @method("PUT")
            @csrf
                <fieldset class="border p-4">
                    <legend class="text-primary">Nombre</legend>
                    <div class="form-group">
                        <label for="nombre ">Nombre de la especialidad</label>
                        <input readonly
                            type="text"
                            id="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="Nombre"
                            value="{{$categoria->nombre}}"
                            name="nombre"
                        >
                        @error('nombre')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen de la especialidad</label>
                        <input
                            type="file"
                            id="imagen"
                            class="form-control @error('imagen') is-invalid @enderror"
                            name="imagen_principal"
                        >
                        @error('imagen')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="mt-4">
                        <p>Imagen actual:</p>
                        <img src="/storage/{{$categoria->imagen}}" style="width: 300px">
                    </div>
                </fieldset>
                <fieldset class="border p-4 mt-5">
                <legend  class="text-primary">Información de la especialidad: </legend>
                    <div class="form-group">
                        <label for="nombre">Descripción</label>
                        <textarea
                            class="form-control  @error('descripcion')  is-invalid  @enderror"
                            name="descripcion"
                        >{{ $categoria->descripcion }}</textarea>

                            @error('descripcion')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
            <input type="submit" class="btn btn-primary mt-3 d-block" value="Registrar Especialidad">
            </form>
        </div>
    </div>
@endsection

