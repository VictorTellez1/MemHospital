@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <<div class="container shadow p-3 mb-5 bg-white rounded m-10">
        <h2 class="text-uppercase mt-5 mb-3 text-center">Instalaciones</h2>
        <div class="row">
            @foreach ($imagenes as $imagen)
                <div class="col-md-6 mb-2">
                    <div class="card mt-10">
                        <a href="/storage/{{$imagen->ruta_imagen}}" data-lightbox="imagenes" data-title="Imagen Hospital">
                            <img src="/storage/{{$imagen->ruta_imagen}}" class="card-img-top img-fluid" alt="imagen hospital">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
