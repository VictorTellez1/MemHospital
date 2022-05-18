<template>
    <input
        type="submit"
        class="btn btn-danger mr-1 d-block w-100 mb-2"
        value="Eliminar"
        v-on:click="eliminarReceta"
        >

</template>

<script>
    export default{
        props:['categoriaId'],
        methods:{
            eliminarReceta(){
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
                        id:this.categoriaId
                    }
                    axios.post(`/categoria/${this.categoriaId}`,{params,_method:'delete'})
                        .then(respuesta=>{
                             this.$swal({
                                title:'Categoria eliminada',
                                text:'Se elimino la categoria',
                                type:'success'

                            });
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode)
                        }).catch(error=>{
                            console.log(error)
                        })
                })

            }
        }
    }

</script>
