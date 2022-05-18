
import { OpenStreetMapProvider } from 'leaflet-geosearch';
const provider = new OpenStreetMapProvider();
document.addEventListener('DOMContentLoaded',()=>{

    if(document.querySelector('#mapa')){
        const lat = document.querySelector('#lat').value === '' ? 19.6854788 : document.querySelector('#lat').value;
        const lng = document.querySelector('#lng').value === '' ?  -99.2278656 : document.querySelector('#lng').value;

        const mapa = L.map('mapa').setView([lat, lng], 16);
        //Eliminar pines previos
        let markers=new L.FeatureGroup().addTo(mapa);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapa);

        let marker;

        // agregar el pin
        marker = new L.marker([lat, lng],{
            draggable:true,
            autoPan:true
        }).addTo(mapa);
        // Agregar el pin a las capas
        markers.addLayer(marker);

        //Geocode Service
        var geocodeService = L.esri.Geocoding.geocodeService({
            apikey: "AAPK8733415c498c456c8da3ecd7b24fd156hJS6WiH0KH9uDawSy7_Wunr1ra4wanrRlwXvRASKTb4ZVJhQG-KabGbd1htldpOQ" // replace with your api key - https://developers.arcgis.com
          });
          //Buscador de direcciones
          const buscador=document.querySelector('#formbuscador')
          buscador.addEventListener('blur',buscarDireccion)

        //Detectar movimiento del marker
        marker.on('moveend',function(e){
            marker=e.target;
            const posicion=marker.getLatLng();

            //Centrar automaticamente
            mapa.panTo(new L.LatLng(posicion.lat,posicion.lng))

            //Reverse Geocoding, cuando el usuario reubica el pin
            geocodeService.reverse().latlng(posicion,16).run(function(error,resultado){

                marker.bindPopup(resultado.address.LongLabel);
                marker.openPopup();

                //Llenar inputs
                llenarInputs(resultado);

            })


        });
        function buscarDireccion(e){
            if(e.target.value.length>1){
                provider.search({query:e.target.value}) //Este te hace la busqueda, se pueden agregar cosas para que sea mas facil de encontrar
                    .then(resultado=>{
                        if(resultado[0]){
                            //Limpiar los pines previos
                            markers.clearLayers();
                            geocodeService.reverse().latlng(resultado[0].bounds[0],16).run(function(error,resultado){
                                console.log(resultado);
                                //Llenar los inputs
                                llenarInputs(resultado);
                                //Centrar el mapa
                                mapa.setView(resultado.latlng)
                                console.log(resultado.latlng['lat'])
                                const lat = resultado.latlng['lat']
                                const lng = resultado.latlng['lng']
                                //Agreagr el Pin
                                marker = new L.marker([lat, lng],{
                                    draggable:true,
                                    autoPan:true
                                }).addTo(mapa);
                                //asignar el contenedor de markers el nuevo pin
                                markers.addLayer(marker);

                                //Mover el pin
                                marker.on('moveend',function(e){
                                    marker=e.target;
                                    const posicion=marker.getLatLng();

                                    //Centrar automaticamente
                                    mapa.panTo(new L.LatLng(posicion.lat,posicion.lng))

                                    //Reverse Geocoding, cuando el usuario reubica el pin
                                    geocodeService.reverse().latlng(posicion,16).run(function(error,resultado){

                                        marker.bindPopup(resultado.address.LongLabel);
                                        marker.openPopup();

                                        //Llenar inputs
                                        llenarInputs(resultado);

                                    })


                                });
                            })
                        }
                    })
            }

        }
        //Llenar los campos
        function llenarInputs(resultado){

            document.querySelector('#direccion').value=resultado.address.Address || '';
            document.querySelector('#colonia').value=resultado.address.Neighborhood || '';
            document.querySelector('#lat').value=resultado.latlng.lat || '';
            document.querySelector('#lng').value=resultado.latlng.lng || '';
        }

        }


})
