<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tipos de Certificados 
            </h2>
        </template>

        <!--<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1>Hola Mundo Tipos de Certificado</h1>
                    <p v-for="(objeto,index) in tcerti" :key="index">
                    {{objeto.name}}
                    </p>
                </div>
            </div>
        </div>-->

<div class="overflow-x-auto" v-if="modal" >
     
      <div class="flex  py-4 items-center bg-gray-200 antialiased">
      <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
        <div
          class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
        >
        <p class="font-semibold text-gray-800 text-2xl">{{titulo}}</p>
       <button @click="cerrarModal" class="px-4 py-2 text-white font-semibold bg-red-500 uppercase  rounded">
            X
          </button>
        </div>
        <div class="flex flex-col px-6 py-5 bg-gray-50">
       <div class="flex flex-col space-y-2">
        <label for="default" class="text-gray-700 select-none font-medium">Nombre</label>
        <input
        v-model="nombre"
        id="default"
        type="text"
        name="default"
        placeholder="Ingrese Nombre"
        
        class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-200"
        />
        <label for="default" class="text-gray-700 select-none font-medium">Seleccione Certificado</label>
                <select v-model="edo" class="border border-gray-300 rounded text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                <option value="1">EPS</option>
                <option value="0">ARL</option>
                <option value="0">Caja de compensación</option>
                <option value="0">Certificado Laboral</option>

            </select>
    </div>
           <hr />
  
        </div>
        <div
          class="flex flex-row-reverse  items-left  p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
        >
    
          <button v-if="tpAccion" @click="registrar" class="px-4 py-2 text-white font-semibold bg-blue-500 uppercase  rounded">
            guardar
          </button>
          <button @click="update" v-else class="px-4 py-2 text-white font-semibold bg-green-400 uppercase  rounded">
            actualizar
          </button>
          <button @click="cerrarModal" class="px-4 py-2 text-white  font-semibold bg-gray-300 uppercase rounded">
            cancelar
          </button>
        </div>
      </div>
    </div>
  </div>

      <div
        v-if="modal==false"
        class="
          bg-gray-100
          flex
          items-center
          justify-center
          bg-gray-100
          font-sans
          overflow-hidden
        "
      >
      
        <div class="w-full lg:w-5/6">
          <div class="bg-white shadow-md rounded my-6">
             <button @click="abrirModal" class="py-2 px-5 bg-gradient-to-r from-indigo-500 via-pink-500 to-yellow-500 hover:from-indigo-600 hover:via-pink-600 hover:to-red-600 focus:outline-none text-white   ">NUEVO</button>
            <table class="min-w-max w-full table-auto">
              <thead>
                <tr
                  class="
                    bg-gray-300
                    text-gray-800
                    uppercase
                    text-sm
                    leading-normal
                  "
                >
                  <th class="py-3 px-6 text-left ">Nombre</th>
                  <th class="py-3 px-6 text-left">Estado</th>
                  <th class="py-3 px-6 text-center w-24">Acciones</th>
                </tr>
              </thead>
              <tbody class="text-gray-600 text-sm font-light">
                <tr v-for="(objeto, index) in tcerti" :key="index">
                  <td class="py-3 px-6 text-left ">
                    <div class="flex items-center">
                      <span v-text="objeto.name"></span>
                    </div>
                  </td>

                  <td v-if="objeto.state==1" class="py-3 px-6 text-left">
                    <span
                      class="
                        bg-green-200
                        text-green-600
                        py-1
                        px-3
                        rounded-full
                        text-xs
                      "                    
                      >Disponible</span
                    >
                  </td>
                  <td v-else class="py-3 px-6 text-left">
                    <span
                      class="
                        bg-red-200
                        text-red-600
                        py-1
                        px-3
                        rounded-full
                        text-xs
                      "                    
                      >NO Disponible</span
                    >
                  </td>
                  <td class="py-3 px-6 text-center w-24">
                    <div class="flex item-center justify-center">
                      <div
                        class="
                          w-4
                          mr-2
                          transform
                          hover:text-green-500
                          hover:scale-110
                        "
                        title="Ver"
                        @click="abrirModal"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                          />
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                          />
                        </svg>
                      </div>
                      <div
                     
                        class="
                          w-4
                          mr-2
                          transform
                          hover:text-blue-500
                          hover:scale-110
                        "
                        title="Actualizar"
                        @click="actualizar(objeto)"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                          />
                        </svg>
                      </div>
                      <div
                        class="
                          w-4
                          mr-2
                          transform
                          hover:text-red-500
                          hover:scale-110
                        "
                        title="Eliminar"
                        @click="eliminar(objeto)"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                          />
                        </svg>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- eliminar -->
      <div v-if="tpAccion==2">
        <div class="bg-opacity-25 flex flex-col space-y-4 min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-gray-600">
        <div class="flex flex-col p-8 bg-white shadow-md hover:shodow-lg rounded-2xl">
          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg"
                class="w-16 h-16 rounded-2xl p-3 border border-blue-100 text-blue-400 bg-blue-50" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <div class="flex flex-col ml-3">
                <div class="font-medium leading-none">Desea eliminar este registro ?</div>
                <p class="text-sm text-gray-600 leading-none mt-1">Este proceso no es reversible esta seguro?
                </p>
              </div>
            </div>
            <button @click="confirmar" class="flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">SI</button>
                <button  @click="confirmarNO" class="flex-no-shrink bg-gray-800 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-gray-900 text-white rounded-full">NO</button>
          </div>
        </div>
</div>
      </div>
  
    <!-- component -->

  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";


export default defineComponent({
  components: {
    AppLayout
  },
   data() {
    return {
      modal: false,
      titulo:"",
      tpAccion:1,//1 guardar 0 actualizar
      nombre:"",
      edo:"1",
      idtcerti:"",
      arrayDatos:[]
  
    };
  },
  methods: {
    demo(){
        alert("Hola munod voy a editar");
    },
    limpiar(){
      this.nombre="";
      this.edo="1";   
    },
    registrar(){ 
          
      let me=this;
      var url="/api/tcerti/registrar";
      axios.post(url, {
        name:this.nombre.toUpperCase(),
        state:this.edo
      })
      .then(function(response) {
        me.listarDatos();
        me.limpiar();
        me.cerrarModal();
        me.mensaje('Registro guardado', 'El registro se guardó exitosamente','success');
        
      })
      .catch(function(error) {
        console.log(error);
      });

    },
    abrirModal(){
      this.titulo = "Nuevo Registro"
      this.modal = true;
    },  
    update(){
      let me=this;
      var url="/api/tcerti/actualizar";
      axios.put(url, {
        id:this.idtcerti,
        name:this.nombre.toUpperCase(),
        state:this.edo
      })
      .then(function(response) {
        me.listarDatos();
        me.mensaje('Registro actualizado!!','El registro se actualizo exitosamente','success');
        
      })
      .catch(function(error) {
        console.log(error);
      });

    } , 
    actualizar(data=[]){
      this.idtcerti=data['id'];
      this.nombre=data['name'];
      this.edo=data['state'];
      this.modal = true;
      this.tpAccion=0;
      this.titulo = "Actualizar Registro"
    },
    delete(){
      let me=this;
      var url="/api/tcerti/eliminar" ;
      axios.post(url,{
        id:this.idtcerti
      })
      .then(function(response) {
        me.listarDatos();
        me.mensaje('Registro eliminado!!','El registro se eliminó exitosamente','success');        
      })
      .catch(function(error) {
        console.log(error);
      })
    },
    eliminar(data=[]){
      this.idtcerti=data['id'];
      this.tpAccion=2;
    },
    listarDatos(){
      let me=this;
      var url="/api/tcerti/index";

      axios.get(url)
      .then(function(response){
        var respuesta=response.data;
        me.arrayDatos=respuesta.tcerti;
      })
      .catch(function(error){
      })
    },
    cerrarModal(){
      this.modal = false;
    },
    confirmar(){
      this.delete();
      this.tpAccion=0;
    },
    confirmarNO(){
      this.tpAccion=0;
    },
    mensaje(head,body,button){
      Swal.fire(
        head,
        body,
        button
      )
    }

},
mounted(){
  this.listarDatos();
},
  props: ["tcerti"],
},

);

</script>
<style>

.table {
  border-spacing: 0 15px;
}

i {
  font-size: 1rem !important;
}

.table tr {
  border-radius: 20px;
}

tr td:nth-child(n + 5),
tr th:nth-child(n + 5) {
  border-radius: 0 0.625rem 0.625rem 0;
}

tr td:nth-child(1),
tr th:nth-child(1) {
  border-radius: 0.625rem 0 0 0.625rem;
}
</style>
    

