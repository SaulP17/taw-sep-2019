<!-- SOLO ESTA COMO VISTA POR ESTE MOMENTO -->
<div class="content-wrapper">
	<div class="container">
   		<div class="content-header">
      		<div class="container-fluid">
        		<div class="row mb-2">
          			<div class="col-sm-6">
            			<h4><i class="fas fa-search"></i> Buscar Categorías</h4>
          			</div>
        
        		</div>
        		<form class="form-horizontal" role="form" id="datos_cotizacion">
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
							<a href="index.php?action=NuevaCategoria"><button type='button' class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus-square" ></span> Nueva Categoria</button></a>
						</div>	
					</div>
				</form>
      		</div>
    		</div>
			  <table class="table">
            <thead class="thead-dark">
            <tr>
              
              <th scope="col">Categoria</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Fecha</th>							
              <th><span class="pull-left">Acciones</span></th>					
            </tr>
          </thead>	
          <tbody scope="row">
            <?php
              $vistaCategorias = new MvcController();
              $vistaCategorias -> vistaCategoriasController();
              $vistaCategorias -> borrarCategoriasController();
            ?>
          </tbody>
        </table>
		
			

	</div>
</div>