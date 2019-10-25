<!-- VISTA DE LOS USUARIOS YA REGISTRADOS -->
<div class="content-wrapper">
	<div class="container">
   		<div class="content-header">
      		<div class="container-fluid">
        		<div class="row mb-2">
          			<div class="col-sm-6">
            			<h4><i class="fas fa-search"></i> Buscar Usuarios</h4><!-- TITULO  -->
          			</div>
        
        		</div>
				<!-- FORMULARIO PARA BUSCAR UN USUARIO EN ESPECIFICO (AUN NO IMPLEMENTADO)  -->
        		<form method="post" class="form-horizontal" role="form" id="datos_cotizacion">
					<div class="form-group row">
						<h4>Nombre: </h4>
						<div class="col-md-5">
								<input type="text" class="form-control" placeholder="Nombre">
						</div>
						<div class="col-md-3">
								<button type="button" class="btn btn-default">
									<span class="fas fa-search" ></span> Buscar</button>
									<span id="loader"></span>
						</div>

						<div class="btn-group pull-right">
							<a href="index.php?action=NuevoUsuario"><button type='button' class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus-square" ></span> Nueva Usuario</button></a>
						</div>
								
					</div>
				</form><!-- FIN FORMULARIO DE BUSCAR  -->

      		</div>
    		</div>
			<!-- TABLA PARA LA VISUALIZACION DE LOS USUARIOS YA REGISTRADOS -->
			<table class="table">
				<thead class="thead-dark">
					<tr><!-- ENCABEZADOS DE LA TABLA 5 TITULOS MAS EL DE ACCIONES  -->
						<th scope="col">Nombre</th>
						<th scope="col">Usuario</th>
						<th scope="col">Contraseña</th>
						<th scope="col">Email</th>
						<th scope="col">Fecha</th>
						<th><span class="pull-left">Acciones</span></th>					
					</tr>
				</thead>	
				<tbody scope="row"><!-- EL CUERPO DE MI TABLA (USUARIOS REGISTRADOS)  -->
					<?php
					$vistaUsuario = new MvcController();//CREO MI OBJETO Y MANDO A LLAMAR LAS DOS FUNCIONES 
					$vistaUsuario -> vistaUsuariosController();//PARA VER LOS USUARIOS REGISTRADOS Y
					$vistaUsuario -> borrarUsuarioController();// PARA BORRARLOS
					?>
					
				</body>
       		</table>
	</div>
</div>