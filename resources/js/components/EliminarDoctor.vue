<template>
    <input
        type="submit"
        class="btn btn-danger mr-1 d-block w-100 mb-2"
        value="Eliminar"
        v-on:click="eliminarDoctor"
        >
</template>

<script>
export default {
    props:['doctorId'],
    methods:{
        eliminarDoctor(){
            this.$swal({
                title: '¿Deseas eliminar esta categoria?',
                text: "Una vez eliminada no se puede recuperar",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText:'No'
                }).then((result) => {
                    const params={
                        id:this.doctorId //necesario cuando se hace un delete
                    }
                    //Enviar la peticion al servidor con axios
                    axios.post(`/doctor/${this.doctorId}`,{params,_method:'delete'})
                        .then(respuesta=>{
                            this.$swal({
                                title:'Doctor eliminado',
                                text:'Se elimino el doctor',
                                type:'success'

                            });
                            //Eliminar receta del DOM
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        })
                        .catch(error=>{
                            console.log(error)
                        })
                })
        }
    }
}
</script>
