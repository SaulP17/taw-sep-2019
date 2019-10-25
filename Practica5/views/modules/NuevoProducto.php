<div class="content-wrapper">
	<div class="container">
   <!-- Horizontal Form -->
   <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Inventario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post"  class="form-horizontal">
                <div class="card-body">

                <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="number" class="form-control" name="codigo_producto" placeholder="Codigo Producto">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="nombre_producto" placeholder="Nombre del Producto">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="number" class="form-control" name="precio_producto" placeholder="Precio del Prodcuto">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="number" class="form-control" name="stock" placeholder="Stock">
                    </div>
                  </div>
                  
                      <label>Filtrar por categoría</label>
                      <div class="form-group row">
                      <div class="col-md-12">
                      <select class="form-control" name="id_categoria">
                        <?php
                          $select = new MvcController();
                          $select -> vistaSelectCategoriasController();
                        ?> 
                      </select>            
					        </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="index.php?action=inventario"><button type="submit" class="btn btn-secondary">Guardar</button></a>
                  <a href="index.php?action=inventario"><button type="button" class="btn btn-default float-right">Cancel</button></a>
                </div>
                <!-- /.card-footer -->
              </form>
              <?php
                    $registro = new MvcController();
                    $registro -> registroProductoController();
                    // if(isset($_GET["action"])){
                    //     if($_GET["action"] == "ok"){
                    //         echo "Registro Exitoso";
                    //     }
                    // }
              ?>
            </div>
            <!-- /.card -->   
            </div>
           </div>