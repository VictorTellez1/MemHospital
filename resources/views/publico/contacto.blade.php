@extends('layouts.app')
@section('content')
<div class="container bg-light">
    <h1 class="text-center mt-4">Contactanos para agendar tu cita</h1>
    <div class="mt-5 row justify-content-center ">
                <form
                    action="{{route('contacto.store')}}"
                    method="POST"
                    enctype="multipart/form-data"
                >
            @csrf
            <fieldset class="border p-4 bg-dark">
                <legend class="text-white">Tus datos personales</legend>
                <div class="form-group mt-4">
                    <input
                        type="text"
                        id="nombre"
                        class="form-control @error('nombre') is-invalid @enderror"
                        placeholder="Nombre"
                        value="{{old('nombre')}}"
                        name="nombre"
                    >
                    @error('nombre')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <input
                        type="text"
                        id="telefono"
                        class="form-control @error('telefono') is-invalid @enderror"
                        placeholder="Telefono"
                        value="{{old('telefono')}}"
                        name="telefono"
                    >
                    @error('telefono')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="form-group mt-4">
                    <input
                        type="number"
                        id="edad"
                        class="form-control @error('edad') is-invalid @enderror"
                        placeholder="Tu edad"
                        value="{{old('edad')}}"
                        name="edad"
                    >
                    @error('edad')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                </div>
            </fieldset>
            <fieldset class="border p-4 mt-5 bg-dark">
            <legend  class="text-white">Seleccionar la especialidad</legend>
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
                        {{old('categoria_id')===$categoria->id ? 'selected' : ''}}
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
                <div class="form-group mt-4">
                    <textarea
                        class="form-control  @error('descripcion')  is-invalid  @enderror"
                        name="descripcion"
                        placeholder="Describa brevemente sus sintomas"
                    >{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                </div>
            </fieldset>
            <input type="submit" class="btn btn-primary mt-3 d-block" value="Agendar cita">
        </form>
    </div>
</div>
@endsection
