@extends('layouts.app')
@section('styles')
<!--Leaflet-->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/> <!--Leaflet-->
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.3/dist/esri-leaflet-geocoder.css"
    integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
    crossorigin=""><!--Leaflet par plugins-->
    <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css"
  /> <!--Geocoder-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/basic.min.css" integrity="sha512-MeagJSJBgWB9n+Sggsr/vKMRFJWs+OUphiDV7TJiYu+TNQD9RtVJaPDYP8hA/PAjwRnkdvU+NsTncYTKlltgiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--Dropzone-->
  @endsection
@section('content')

    <div class="container">
        <h1 class="text-center mt-4">Modificar Info Hospital</h1>
        <div class="mt-5 row justify-content-center">
            <form
                class="col-md-9 col-xs-12 card card-body"
                action="{{route('hospital.update',['hospital'=>$hospital->id])}}"
                method="POST"
                enctype="multipart/form-data"
            >
            @csrf
            @method("PUT")
                <fieldset class="border p-4">
                    <legend class="text-primary">Datos del Hospital</legend>
                    <div class="form-group">
                        <label for="nombre">Nombre del Hospital</label>
                        <input
                            id="nombre"
                            type="text"
                            placeholder="Nombre del Hospital"
                            class="form-control @error('nombre') is-invalid @enderror"
                            value="{{$hospital->nombre}}"
                            name="nombre"
                        >
                        @error('nombre')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                        <p class="text-secundary mt-5 mb-3 text-center">El asistente colocara una direccion estimada, o mueve el pin hacia el lugar correcto</p>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Coloca la direccion del Establecimiento</label>
                        <input
                            id="formbuscador"
                            type="text"
                            placeholder="Direccion de la siguiente forma: Calle + Municipio"
                            class="form-control"
                        >
                        <p class="text-secundary mt-5 mb-3 text-center">El asistente colocara una direccion estimada, o mueve el pin hacia el lugar correcto</p>
                    </div>
                    <div class="form-group">
                        <div id="mapa" style="height:400px;"></div> <!--Esto es leaflet-->

                    </div>
                    <p class="informacion">Confirma que los siguientes campos son correctos</p>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input
                            type="text"
                            id="direccion"
                            class="form-control @error('direccion') is-invalid @enderror"
                            placeholder="Direccion"
                            value="{{$hospital->direccion}}"
                            name="direccion"
                        >
                        @error('direccion')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion">Colonia</label>
                        <input
                            type="text"
                            id="colonia"
                            class="form-control @error('colonia') is-invalid @enderror"
                            placeholder="Colonia"
                            value="{{$hospital->colonia}}"
                            name="colonia"
                        >
                        @error('colonia')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <input type="hidden" id="lat" name="lat" value="{{$hospital->lat}}">
                    <input type="hidden" id="lng" name="lng" value="{{$hospital->lng}}">
                </fieldset>

                <fieldset class="border p-4 mt-5">
                <legend  class="text-primary">Información Hospital: </legend>
                    <div class="form-group">
                        <label for="nombre">Teléfono</label>
                        <input
                            type="tel"
                            class="form-control @error('telefono')  is-invalid  @enderror"
                            id="telefono"
                            placeholder="Teléfono Hospital"
                            name="telefono"
                            value="{{ $hospital->telefono}}"
                        >

                            @error('telefono')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
            </fieldset>
            <fieldset class="border p-4 mt-5">
                <legend  class="text-primary">Fotos del Hospital: </legend>
                    <div class="form-group">
                        <label for="imagenes">Imagenes</label>
                        <div id="dropzone" class="dropzone form-control p-5 mx-auto"></div>
                    </div>

                        @foreach ($imagenes as $imagen)
                            <input class="galeria" type="hidden" value="{{$imagen->ruta_imagen}}">
                        @endforeach


                </fieldset>
            <input type="hidden" id="uuid" name="uuid" value="{{$hospital->uuid}}">
            <input type="submit" class="btn btn-primary mt-3 d-block" value="Editar Info Hospital">

            </form>
        </div>


    </div>
@endsection
@section('scripts')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>
<script src="https://unpkg.com/esri-leaflet@3.0.8/dist/esri-leaflet.js"
integrity="sha512-E0DKVahIg0p1UHR2Kf9NX7x7TUewJb30mxkxEm2qOYTVJObgsAGpEol9F6iK6oefCbkJiA4/i6fnTHzM6H1kEA=="
crossorigin="" defer></script>
<script src="https://unpkg.com/esri-leaflet-geocoder@3.1.3/dist/esri-leaflet-geocoder.js"
integrity="sha512-mwRt9Y/qhSlNH3VWCNNHrCwquLLU+dTbmMxVud/GcnbXfOKJ35sznUmt3yM39cMlHR2sHbV9ymIpIMDpKg4kKw=="
crossorigin="" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone-min.js" integrity="sha512-FFyHlfr2vLvm0wwfHTNluDFFhHaorucvwbpr0sZYmxciUj3NoW1lYpveAQcx2B+MnbXbSrRasqp43ldP9BKJcg==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
<!--Dropzone-->
@endsection
