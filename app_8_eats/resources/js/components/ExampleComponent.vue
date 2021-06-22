<template>
    <form>

        <div class="row">
    <div class="col-md-6">
        <div class="alert alert-default" role="alert">
    <strong>Valor Variable</strong> {{ v_error }}
</div>
    </div>
    <div class="col-md-6">
        <div class="alert alert-default" role="alert">
            <ul>
                <li v-for="v_negocio in lista_negocios">{{ v_negocio.nombre }}</li>
            </ul>
</div>
    </div>
</div>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" class="form-control" v-model="negocio.nombre" id="nombre" placeholder="Nombre del Negocio">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" class="form-control" v-model="negocio.descripcion" id="descripcion" placeholder="Descripción del Negocio">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" class="form-control" v-model="negocio.avenida" id="avenida" placeholder="Avenida del Negocio">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" class="form-control" v-model="negocio.no_ext" id="no_ext" placeholder="No. Exterior del Negocio">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" class="form-control" v-model="negocio.no_int" id="no_int" placeholder="No. Interior del Negocio">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" class="form-control" v-model="negocio.cp" id="cp" placeholder="Código Postal del Negocio">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" class="form-control" v-model="negocio.telefono" id="telefono" placeholder="Teléfono Postal del Negocio">
      </div>
    </div>
  </div>

<div class="row">
    <div class="col-md-6">
        <button type="button" class="btn btn-primary" @click="guardarNegocio">Guardar</button>
    </div>
</div>

<!--  -->
</form>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            this.obtener_negocios()
        },
        data(){
            return {
                negocio: {},
                v_error: '',
                lista_negocios: {},
            }
        },
        methods: {
            guardarNegocio(){
                axios.post('/guardar_negocio', this.negocio)
                    .then((response) => {
                        console.log("OK")
                        this.negocio = {}
                        this.v_error = ''
                        this.obtener_negocios()
                    })
                    .catch((error) => {
                        this.v_error = error.response.data.errors

                        console.log(error.response)
                    })
            },
            obtener_negocios(){
                axios.get('/lista_negocios')
                    .then((response) => {
                        this.lista_negocios = response.data
                    })
                    .catch((error) => {
                        this.v_error = error.response.data.message

                        console.log(error.response)
                    })
            }
        }
    }
</script>
