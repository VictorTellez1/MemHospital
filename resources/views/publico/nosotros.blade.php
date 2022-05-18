@extends('layouts.app')
@section('content')
    <div class="container my-5">
        @foreach ($hospitales as $hospital)
            <H2 class="text-center mb-2">{{$hospital->nombre}}</H2>
            <div class="row align-items-start">
                <h2 class="text-center mb-5">Más de 10 años a tu lado</h2>
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil quaerat, corrupti saepe repellat deserunt ab molestiae soluta ipsam pariatur recusandae blanditiis tempora qui ea rem doloremque nemo officia facere? Dolor!
                        Rerum quia quod reprehenderit ab delectus, eligendi omnis voluptatum est ut hic quo adipisci vero minus quaerat ullam labore cumque exercitationem repellendus magnam sit rem, earum dolorum perferendis! Sit, dignissimos!
                        Quos maxime officiis soluta corrupti, placeat dicta, possimus aliquid in ducimus deserunt, minus repellendus! Explicabo consectetur libero illo molestias dolorum voluptates dolorem esse, possimus cupiditate minus accusantium porro ipsa quisquam?
                        Nulla ducimus quidem temporibus quis, corporis ad quasi quaerat repudiandae non iure natus delectus nobis animi provident ea dolore debitis voluptas. Velit corrupti, deserunt voluptate nisi animi odit ratione vitae!</p>
                </div>
                <aside class="col-md-4">
                    <div>
                        <mapa-ubicacion
                            lat-id={{$hospital->lat}}
                            lng-id={{$hospital->lng}}
                            nombre-id={{$hospital->nombre}}
                        ></mapa-ubicacion>
                    </div>
                    <div class="p-4 bg-primary">
                        <h2 class="text-center text-white mt-2 mb-4">Informacion Hospital</h2>
                        <p class="text-white mt-1">
                            <span class="font-weight-bold">
                                Ubicacion:
                            </span>
                                {{$hospital->direccion}}
                        </p>
                        <p class="text-white mt-1">
                            <span class="font-weight-bold">
                                Colonia:
                            </span>
                                {{$hospital->colonia}}
                        </p>
                        <p class="text-white mt-1">
                            <span class="font-weight-bold">
                                Telefono:
                            </span>
                                {{$hospital->telefono}}
                        </p>
                    </div>
                </aside>
            </div>
        @endforeach
    </div>
<div class="d-flex justify-content-around shadow-lg p-4">
        <div class="p-4 col-md-4 text-center">
            <p  class="font-weight-bold h3">Mision</p>
            <div>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Corporis quisquam ipsa voluptatibus nam asperiores!
                Nesciunt suscipit aspernatur a labore, dolore omnis ut dolorem
                itaque rem dolorum ratione. Eius, dolore sit?
            </div>
            </div>
                <div class="p-4 col-md-4 text-center text">
                    <p class="font-weight-bold h3">Vision</p>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Corporis quisquam ipsa voluptatibus nam asperiores!
                        Nesciunt suscipit aspernatur a labore, dolore omnis ut dolorem
                        itaque rem dolorum ratione. Eius, dolore sit?
                    </p>
                </div>
                <div class="p-4 col-md-4 text-center">
                    <p class="font-weight-bold h3">Valores</p>
                    <div>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Corporis quisquam ipsa voluptatibus nam asperiores!
                        Nesciunt suscipit aspernatur a labore, dolore omnis ut dolorem
                        itaque rem dolorum ratione. Eius, dolore sit?
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-around shadow-lg p-5 mt-1">
                <div class="p-4 col-md-6 text-center">
                    <p  class="font-weight-bold h2 ">Politicas de calidad</p>
                    <div class="text-center my-auto">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Corporis quisquam ipsa voluptatibus nam asperiores!
                        Nesciunt suscipit aspernatur a labore, dolore omnis ut dolorem
                        itaque rem dolorum ratione. Eius, dolore sit?
                    </div>
                </div>
                <div class="p-4 col-md-6 text-center text">
                    <p>
                        <img src="/storage/img/maxresdefault.jpg" alt="politicas" width="400" height="300">
                    </p>
                </div>
            </div>


@endsection
