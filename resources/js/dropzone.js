const { default: axios } = require("axios");

document.addEventListener('DOMContentLoaded',()=>{
    if(document.querySelector('#dropzone')){
        Dropzone.autoDiscover=false;
        const dropzone=new Dropzone('div#dropzone',{ //Aqui es donde esta dropzone en el formulario
            url:'/imagenes/store',
            dictDefaultMessage:'Sube hasta 10 imagenes',
            maxFiles:10,
            required:true,
            acceptedFiles:".png,.jpg,.bmp,.jpeg",
            addRemoveLinks:true,
            dictRemoveFile:"Eliminar imagen",
            headers:{
                'X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content
            },
            init:function(){
                const galeria=document.querySelectorAll('.galeria');
                galeria.forEach(imagen=>{
                    const imagenPublicada={};
                    imagenPublicada.name=imagen.value;
                    imagenPublicada.nombreServidor=imagen.value;
                    this.options.addedfile.call(this,imagenPublicada);
                    this.options.thumbnail.call(this,imagenPublicada,`/storage/${imagenPublicada.name}`);
                    imagenPublicada.previewElement.classList.add('dz-sucess');
                    imagenPublicada.previewElement.classList.add('dz-complet');
                })
            },
            success:function(file,respuesta){
                file.nombreServidor=respuesta.archivo;
            },
            sending:function(file,xhr,formData){
                formData.append('uuid',document.querySelector('#uuid').value) //Es lo que le vas a mandar al servidor, en este caso el id unico

            },
            removedfile:function(file,respuesta){
                const params={
                    imagen:file.nombreServidor
                }
                axios.post('/imagenes/destroy',params)
                    .then(respuesta=>{
                        console.log(respuesta); //Aqui se lee la respuesta enviada por el servidor
                        //Eliminar del DOM
                        file.previewElement.parentNode.removeChild(file.previewElement);


                    })


            }
        });
   }

})
