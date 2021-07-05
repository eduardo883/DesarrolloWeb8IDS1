<template>
    
    <div>

    <div class="header bg-gradient-primary pt-5 pt-md-6">
    <div class="container-fluid">
    
        <!-- Header -->
        <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Alimentos</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a>Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Alimentos</li>
                    </ol>
                </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                <button type="button" class="btn btn-sm btn-neutral" id="NuevoCondominio" @click="nuevoAlimento()">Nuevo Alimento</button>
                <button type="button" class="btn btn-sm btn-neutral">Recargar Alimentos</button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="alert alert-default" role="alert">
    <strong>Valor Variable</strong> {{ v_error }} 
</div>
    </div>

    <div class="col-md-6">
        <div class="alert alert-default" role="alert">
    <ul>
        <li v-for="v_alimento in lista_alimentos">{{ v_alimento.nombre_a}}</li>
    </ul>
</div>
    </div>
</div>


<!-- Elementos en Agregar -->
    <form>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" class="form-control" id="nombre_a" v-model="alimento.nombre_a" placeholder="Escribe el Nombre del Alimento">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" id="descripcion" v-model="alimento.descripcion" placeholder="Escribe la Descripción del Alimento" class="form-control"/>
      </div>
    </div>
    
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" class="form-control" id="precio" v-model="alimento.precio" placeholder="Ingresa el Precio del Alimento">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <select class="form-control" id="tipo" v-model="alimento.tipo">
            <option>Selecciona una Opción</option>
            <option value="Desayuno">Desayuno</option>
            <option value="Comida">Comida</option>
            <option value="Bebida">Bebida</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-md-12">
      <div class="form-group">
        <input type="text" id="cantidad" v-model="alimento.cantidad" placeholder="Escribe la Cantidad del Alimento" class="form-control"/>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-md-6">
          <button type="button" class="btn btn-primary" @click="guardarAlimento">Guardar Alimentos</button>
      </div>
  </div>
</form>
<!-- FIN ELEMENTOS -->
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            this.obtener_alimentos()
        },
        data(){
            return {
                alimento: {},
                v_error: '',
                lista_alimentos: {},
            }
        },
        methods: {
            guardarAlimento(){
                axios.post('/guardar_alimento', this.alimento)
                    .then((response) => {
                        console.log("OK")
                        this.alimento = {}
                        this.v_error = ''
                        this.obtener_alimentos()
                    })
                    .catch((error) => {
                        this.v_error = error.response.data.errors
                        console.log(error.response)
                    })
            },
            obtener_alimentos(){
                axios.get('/lista_alimentos')
                    .then((response) => {
                        this.lista_alimentos = response.data
                    })
                    .catch((error) => {
                        this.v_error = error.response.data.message
                        console.log(error.response)
                    })
            }
        }
    }
</script>