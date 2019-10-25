<!-- HTML DEL LOGIN -->
<body background="dist/img/photo5.jpg">
<div class="login-box">
  <div class="card">
    <div class="login-logo">
      <a href=""><b>Admin</b>LTE</a>
      <span class="fas fa-user"></span>
    </div>
  
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresa para empezar tu sesión</p>
        <!-- FORMULARIO PARA EL EL INICIO DE SESION -->
       <form  method="POST">
         <div class="input-group mb-3">
           <input type="text" class="form-control" placeholder="Usuario" name="usuarioIngreso" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>         
           <div class="input-group mb-3">
           <input type="password" class="form-control" placeholder="Contraseña" name="passwordIngreso" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
            <button type="submit" value="Enviar" class="btn btn-primary btn-block btn-flat" >Entrar</button>
      </form>
      <?php
        // crea el objeto y trae la funcion del controler para verificar lo del login
        $ingreso = new MvcController();
        $ingreso -> iniciarController();

        if(isset($_GET["action"])){
	        if($_GET["action"] == "fallo"){
		        echo "Fallo al ingresar";	
	        }
        }
      ?>  
    </div>
  </div>
</div>
  
</body>


