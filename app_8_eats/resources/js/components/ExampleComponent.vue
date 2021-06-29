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
                <h6 class="h2 text-white d-inline-block mb-0">Negocios</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a>Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Negocios</li>
                    </ol>
                </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                <button type="button" class="btn btn-sm btn-neutral" id="NuevoCondominio" @click="nuevoNegocio()">Nuevo Negocio</button>
                <button type="button" class="btn btn-sm btn-neutral">Recargar Negocios</button>
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
</div>


<!-- Tabla Negocio -->

  <div class="table-responsive">
    <table class="table align-items-center">
    <thead class="thead-light">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Avenida</th>
            <th scope="col">No. Exterior</th>
            <th scope="col">No. Interior</th>
            <th scope="col">Código Postal</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody v-for="v_negocio in lista_negocios"> 
        <tr>
            <th scope="row">
                <span> {{ v_negocio.nombre }} </span>
            </th>
            <td>
                <span> {{ v_negocio.descripcion }} </span>
            </td>
            <td>
                <span> {{ v_negocio.avenida }} </span>
            </td>
            <td>
                <span> {{ v_negocio.no_ext }} </span>
            </td>
            <td>
                <span> {{ v_negocio.no_int }} </span>
            </td>
            <td>
                <span> {{ v_negocio.cp }} </span>
            </td>
            <td>
                <span> {{ v_negocio.telefono }} </span>
            </td>
            <td class="text-right">
                <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" @click="editar_negocio(v_negocio)">Editar</a>
                        <a class="dropdown-item" @click="eliminandoNegocio()">Eliminar</a>
                    </div>
                </div>
            </td>
        </tr>
        
    </tbody>
</table>

</div>

<!-- Fin de Tabla -->

<div class="col-md-4">
      
      <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
        	
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Eliminar Negocio</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            
            <div class="modal-body">
            	
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Atención!</h4>
                    <span>¿Seguro que deseas eliminar este negocio?</span>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-white" @click="eliminar_negocio(v_negocio)">Eliminar</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cerrar</button> 
            </div>
            
        </div>
    </div>
</div>
  </div>
    

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Negocio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

        

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
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="guardarNegocio">Guardar</button>
      </div>
    </div>
  </div>
</div>

</div>
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
                editando_negocio: false,
            }
        },
        methods: {
            guardarNegocio(){


              if(this.editando_negocio){
                axios.post('/editar_negocio', this.negocio)
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
                    this.editando_negocio = false
              }else{
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
              }

              $('#exampleModal').modal('toggle');
                
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
            },
            editar_negocio(param_negocio){
              this.editando_negocio = true
              this.negocio = param_negocio

              $('#exampleModal').modal('toggle');
            },
            eliminar_negocio(param_negocio){
              axios.delete('/eliminar_negocio/' + param_negocio.id)
                    .then((response) => {
                        console.log("OK")
                    })
                    .catch((error) => {
                        this.v_error = error.response.data.message

                        console.log(error.response)
                    })

                this.obtener_negocios()
            },
            nuevoNegocio(){
              this.editando_negocio = false

              this.negocio = {}

              $('#exampleModal').modal('toggle');
            },
            eliminandoNegocio(){
              $('#modal-notification').modal('toggle');
            }
        }
    }
</script>
