<div class="content-wrapper">
	<div class="container">
    <!-- Horizontal Form -->
    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">Editar Categoria</h3><!-- TITULO  -->
      </div>
      <!-- /.card-header -->
      <!-- INICIO MI FORMULARIO PARA EDITAR EL USUARIO -->
      <form method="post" class="form-horizontal">
        <!-- TRAIGO LOS DATOS DEL USUARIO SELECCIONADO MEDIANTE LAS SIGUIENTES FUNCIONES -->
        <?php
            $editarCategoria = new MvcController();//CREO MI OBJETO
            $editarCategoria -> editarCategoriaController();//TRAIGO LOS DATOS A MIS INPUTS MEDIANTE ESTA FUNCION
            $editarCategoria -> actualizarCategoriaController();//UNA VEZ LISTO LO QUE VOY A EDITAR MANDO A ACTUALIZAR EN LA BASE DE DATOS
                                                            //MEDIANTE ESTE FUNCION            
        ?>
      </form>
      



    </div>
    <!-- /.card -->
  </div>
</div>