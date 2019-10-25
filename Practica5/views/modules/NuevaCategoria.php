<div class="content-wrapper">
	<div class="container">
   <!-- Horizontal Form -->
   <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Categorias</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" class="form-horizontal">
                <div class="card-body">

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="nombre_categoria" placeholder="Nombre Categoria">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="descripcion_categoria" placeholder="Descripcion Categoria">
                    </div>
                  </div>
                  
                  

      
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="index.php?action=categorias"><button type="submit" class="btn btn-secondary">Guardar</button></a>
                   <a href="index.php?action=categorias"><button type="button" class="btn btn-default float-right">Cancel</button></a>
                </div>
                <!-- /.card-footer -->
              </form>
              <?php
                    $registro = new MvcController();
                    $registro -> registroCategoriaController();
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