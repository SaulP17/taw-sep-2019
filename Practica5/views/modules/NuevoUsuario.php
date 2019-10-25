<div class="content-wrapper">
	<div class="container">
    <!-- Horizontal Form -->
    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">Registrar Usuario</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post" class="form-horizontal">
        <div class="card-body">
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="text" class="form-control" name="firstname" placeholder="Nombre" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="text" class="form-control" name="lastname" placeholder="Apellido" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="text" class="form-control" name="user_name" placeholder="Nombre de Usuario" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="password" class="form-control" name="user_password_hash" placeholder="Contraseña" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="email" class="form-control" name="user_email" placeholder="Email" required>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        
        <div class="card-footer">
          <a href="index.php?action=usuarios"><button type="submit" class="btn btn-secondary">Guardar</button></a>
          
          <a href="index.php?action=usuarios"><button type="button" class="btn btn-default float-right">Cancel</button></a>
        </div>
        <!-- /.card-footer -->
      </form>
      <?php
            $registro = new MvcController();
            $registro -> registroUsuarioController();
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

       
