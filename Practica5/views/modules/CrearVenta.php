<!-- SOLO ES UNA VISTA DE MIENTRAS -->
<div class="content-wrapper">
	<div class="container">
   		<div class="content-header">
      		<div class="container-fluid">
        		<div class="row mb-2">
          			<div class="col-sm-6">
            			<h4><i class="fas fa-search"></i> Producto</h4>
          			</div>
        
        		</div>
        		<form class="form-horizontal" role="form" id="datos_cotizacion">
					<div class="form-group row">
						<h4>Agregar Venta </h4>
						<div class="col-md-5">
								<input type="text" class="form-control" placeholder="Nombre Producto">
						</div>
						<div class="col-md-3">
								<button type="button" class="btn btn-default">
									<span class="fas fa-search" ></span> Buscar Producto</button>
									<span id="loader"></span>
						</div>
						
					</div>
				</form>
      		</div>
    		</div>
			  <table class="table">
          <h4>Productos </h4>
           <thead class="thead-dark">
             <tr>
               <th scope="col">Nombre Producto</th>
               <th scope="col">Precio</th>
               <th scope="col">Stock</th>
               <th><span class="pull-left">Agregar</span></th>					
             </tr>
           </thead>	
           <tbody scope="row">
             <?php
               $vistaInventarios = new MvcController();
               $vistaInventarios -> vistaProductosVController();
           //    $vistaInventarios -> borrarProductoController();
             ?>
           </tbody>
        </table>
    
    <table  class="table">
          <h4>Venta </h4>
           <thead class="thead-dark">
             <tr>
               <th scope="col">Nombre Producto</th>
               <th scope="col">Cantidad</th>
               
               <th><span class="pull-left">Eliminar</span></th>			
             </tr>
           </thead>	
           <tbody scope="row">
             <?php
               $vistaInventarios = new MvcController();
             //  $vistaInventarios -> vistaProductosController();
           //    $vistaInventarios -> borrarProductoController();
             ?>
           </tbody>
        </table>
		        <h3 class="card-title p-3">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Total:
                </h3>
				<h3 class="card-title p-3">
                <input class="form-control" type="text">
          </h3>
    <h3 class="card-title p-2">
 
    <button type="button" class="btn btn-seconadry bg-gradient-info btn-lg">Aceptar</button>
    <button type="button" class="btn btn-secondary bg-gradient-danger btn-lg">Cancelar</button>
  
      </h3>
    
   
    
    
	</div>
</div>

<script>
$(document).ready(function(){
	$('input[type=checkbox]').click(function() {
		if($(this).is(":checked"))
		{
			// el checkbox esta marcado
			// movemos la columna a la tabla2
			var tr=$(this).parents("tr").appendTo("#tabla2 tbody");
		}else{
			// el checkbox esta desmarcado
			// movemos la columna a la tabla1
			var tr=$(this).parents("tr").appendTo("#tabla1 tbody");
		}
	});
});
</script>