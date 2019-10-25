<div class="content-wrapper">
	<div class="container">
    <!-- Horizontal Form -->
    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">Editar Producto</h3><!-- TITULO  -->
      </div>
      <!-- /.card-header -->
      <!-- INICIO MI FORMULARIO PARA EDITAR EL USUARIO -->
      <form method="post" class="form-horizontal">
        <!-- TRAIGO LOS DATOS DEL USUARIO SELECCIONADO MEDIANTE LAS SIGUIENTES FUNCIONES -->
        <?php
            $editarUsuario = new MvcController();//CREO MI OBJETO
            $editarUsuario -> editarInventarioController();//TRAIGO LOS DATOS A MIS INPUTS MEDIANTE ESTA FUNCION
           // $editarUsuario -> actualizarUsuarioController();//UNA VEZ LISTO LO QUE VOY A EDITAR MANDO A ACTUALIZAR EN LA BASE DE DATOS
                                                            //MEDIANTE ESTE FUNCION            
        ?>
      </form>
      



    </div>
    <!-- /.card -->
  </div>
</div>
