<?php
  ob_start();
  class MvcController
  {
      // MANDA A LLAMAR EL TEMPLATE
      public function pagina(){
        include "views/template.php";
      }
      
      // MANDA A LLAMAR EL DE ENLACES
      public function enlacesPaginasController(){
        if(isset($_GET['action'])){
          $enlaces = $_GET['action'];
        }
        else{
          $enlaces = "index";
        }
      //variable que trae: clase de enlaces.php | funcion de enlaces.php para saber que enlaces mostrarle al usuario
      $respuesta = Paginas::enlacesPaginasModel($enlaces);
      include $respuesta;
      }
    


      //LOGIN
      #------------------------------------
      public function iniciarController(){
           if(isset($_POST["usuarioIngreso"])){
                $datosController = array( "user_name"=>$_POST["usuarioIngreso"], 
                                          "user_password_hash"=>$_POST["passwordIngreso"]);
                $respuesta = Crud::iniciarModel($datosController, "users");

                //condicion para verificar los usuarios, si es correcto le manda en el action inicio de lo contrario un fallo
                 if($respuesta["user_name"] == $_POST["usuarioIngreso"] && $respuesta["user_password_hash"] == $_POST["passwordIngreso"]){
                       session_start();                     
                       $_SESSION["validar"] = true;
                       header("location:index.php?action=inicio");
                 }
                 else{
                    //Si nada de lo anterior funciona manda por medio de un get action a fallo
                    header("location:index.php?action=fallo");
                 }
           }	
        }
     
       #----------------------Inventario
         #EDITAR PRODUCTO
      #------------------------------------
      public function editarInventarioController(){

        $datosController = $_GET["id_producto"];//trae el id
        $respuesta = Crud::editarProductoModel($datosController, "products");//manda a llamar los datos en el crud
        //y los muestra en el formulario del siguiente echo con sus respectivos id,codigo,nombres,etc
        echo'
        <div class="card-body">

          <div class="form-group row">
            <div class="col-sm-12">
              Producto(s):<input type="text" class="form-control" value="'.$respuesta["id_producto"].'" name="id_producto" readonly="readonly">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              Codigo Producto(s):<input type="number" class="form-control" value="'.$respuesta["codigo_producto"].'" name="codigo_producto">
            </div>
          </div>

          <div class="form-group row">
          <div class="col-sm-12">
            Nombre:<input type="text" class="form-control" value="'.$respuesta["nombre_producto"].'" name="precio_prodcuto">
          </div>
        </div>

          <div class="form-group row">
            <div class="col-sm-12">
              Precio:<input type="number" class="form-control" value="'.$respuesta["precio_producto"].'" name="precio_prodcuto">
            </div>
          </div>

          <div class="form-group row">
          <div class="col-sm-12">
            Stock:<input type="number" class="form-control" value="'.$respuesta["stock"].'" name="stock">
          </div>
        </div>

        
        <label>Filtrar por categoría</label>
        <div class="form-group row">
        <div class="col-md-12">
       <select class="form-control" name="id_categoria" value="'.$respuesta["id_categoria"].'">
          <?php
            $select = new MvcController();
            $select -> vistaSelectCategoriasController();
          ?> 
        </select> 
        
    </div>
    </div>

          
          <div class="card-footer">
            <a href="index.php?action=inventario&id_producto='.$respuesta["id_producto"].'"><button type="submit" class="btn btn-secondary">Guardar</button></a>
            <a href="index.php?action=inventario"><button type="button" class="btn btn-default float-right">Cancel</button></a>
          </div>

        </div>
        
        ';

      }



       #BORRAR PRODUCTO
      #------------------------------------
      public function borrarProductoController(){
        //VALIDO MI ID
        if(isset($_GET["id_producto"])){
          $datosController = $_GET["id_producto"];
          $respuesta = Crud::borrarProdcutosModel($datosController, "products");
          //Y BORRO MEDIANTE EL CRUD Y UN DELETE LOS DATOS DE USUARIO
          if($respuesta == "success"){
            // ME REDIRIGE A LA VISTA USUARIOS PARA QUE SE ACTUALIZE LA VISTA
            header("location:index.php?action=inventario");
            ob_enf_fluch();
          }
        }
      }
    
    
    
       #---------------------Inventario

       

    
    
        #VISTA DE CATEGORIAS
        #------------------------------------
        public function vistaCategoriasController(){
          // HAGO UNA CONSULTA EN EL CRUD PARA VER LAS CATEGORIAS REGISTRADAS
          $respuesta = Crud::vistaCategoriasModel("categorias");
          //UNA VEZ OBTENIDOS LOS DATOS LOS MANDO IMPRIMIR CON UN FOREACH MEDIANTE UN ECHO
          foreach($respuesta as $row => $item){
            echo'<tr>
                  <td>'.$item["nombre_categoria"].'</td>
                  <td>'.$item["descripcion_categoria"].'</td>
                  <td>'.$item["date_added"].'</td>
                  <td>
                    <span class="pull-left">
                    <a class="btn btn-small btn-info" href="index.php?action=editarCategorias&id_categoria='.$item["id_categoria"].'">
                      <i class="fa fa-edit"></i></a>

                    <a class="btn btn-small btn-danger" href="index.php?action=categorias&id_categoria='.$item["id_categoria"].'">
                      <i class="fa fa-trash"></i></a>
                    </span>
                  </td>
                  
                </tr>';
          }
        }
    
        // VISTA DEL SELECT EN NUEV PRODUCTO         
         public function vistaSelectCategoriasController(){
        $respuesta = Crud::vistaSelectCategoriasModel("categorias");
        foreach($respuesta as $row => $item){
          echo '<option value='.$item["id_categoria"].'>'.
                    $item["nombre_categoria"]
                .'</option>';
        }

       }
        
    
        #VISTA DE PRODUCTOS EN VENTA
        public function vistaProductosVController(){
          // HAGO UNA CONSULTA EN EL CRUD PARA VER LOS PRODUCTOS REGISTRADOS
          $respuesta = Crud::vistaProductosVModel("products");
          //UNA VEZ OBTENIDOS LOS DATOS LOS MANDO IMPRIMIR CON UN FOREACH MEDIANTE UN ECHO
          foreach($respuesta as $row => $item){
            echo'<tr>
                  <td>'.$item["nombre_producto"].'</td>
                  <td>'.$item["precio_producto"].'</td>  
                  <td>'.$item["stock"].'</td>  
                  <td>
                    <span class="pull-left">
                   <div class="btn btn-small btn-info">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                  <a  href="index.php?action=editarProducto&id_producto='.$item["id_producto"].'">
                     </a>
                  Agregar
                </div>
                    </span>
                  </td>
                  
                </tr>';
        }
        }
        #--------------------------------------------
          

        #VISTA DE PRODUCTOS
        #------------------------------------
        public function vistaProductosController(){
          // HAGO UNA CONSULTA EN EL CRUD PARA VER LOS PRODUCTOS REGISTRADOS
          $respuesta = Crud::vistaProductosModel("products");
          //UNA VEZ OBTENIDOS LOS DATOS LOS MANDO IMPRIMIR CON UN FOREACH MEDIANTE UN ECHO
          foreach($respuesta as $row => $item){
            echo'<tr>
                  <td>'.$item["codigo_producto"].'</td>
                  <td>'.$item["nombre_producto"].'</td>
                  <td>'.$item["date_added"].'</td>
                  <td>'.$item["precio_producto"].'</td>
                  <td>'.$item["stock"].'</td>
                  <td>
                    <span class="pull-left">
                    <a class="btn btn-small btn-info" href="index.php?action=editarProducto&id_producto='.$item["id_producto"].'">
                      <i class="fa fa-edit"></i></a>

                    <a class="btn btn-small btn-danger" href="index.php?action=inventario&id_producto='.$item["id_producto"].'">
                      <i class="fa fa-trash"></i></a>
                    </span>
                  </td>
                  
                </tr>';
          }

        }
        
      #--REGISTRO DE PRODUCTOS
        public function registroProductoController(){
          //VALIDO SI ESTA LA CAJA DE TEXTO FIRSTNAME SI ES CORRECTO PROCEDO A GUARDAR LOS DATOS EN
          //UN ARRAY
          if(isset($_POST["codigo_producto"])){
            $datosController = array( "codigo_producto"=>$_POST["codigo_producto"],
                                      "nombre_producto"=>$_POST["nombre_producto"], 
                                      "precio_producto"=>$_POST["precio_producto"],
                                      "stock"=>$_POST["stock"],
                                      "id_categoria"=>$_POST["id_categoria"]);
            $respuesta = Crud::registroProdcutosModel($datosController, "products");
            //MANDO A INSERTAR EN LA TABLA MIS DATOS DE USUARIO
            if($respuesta == "success"){
               // ME REDIRIGE A LA VISTA USUARIOS PARA QUE SE ACTUALIZE LA VISTA
                header("location:index.php?action=inventario");
                ob_enf_fluch();
            }
            else{
                header("location:index.php?action=inventario");
            }
        }
        }



        //REGISTRO DE USUARIO
        public function registroUsuarioController(){
          //VALIDO SI ESTA LA CAJA DE TEXTO FIRSTNAME SI ES CORRECTO PROCEDO A GUARDAR LOS DATOS EN
          //UN ARRAY
          if(isset($_POST["firstname"])){
              $datosController = array( "firstname"=>$_POST["firstname"],
                                        "lastname"=>$_POST["lastname"], 
                                        "user_name"=>$_POST["user_name"],
                                        "user_password_hash"=>$_POST["user_password_hash"],
                                        "user_email"=>$_POST["user_email"]);
              $respuesta = Crud::registroUsuarioModel($datosController, "users");
              //MANDO A INSERTAR EN LA TABLA MIS DATOS DE USUARIO
              if($respuesta == "success"){
                 // ME REDIRIGE A LA VISTA USUARIOS PARA QUE SE ACTUALIZE LA VISTA
                  header("location:index.php?action=usuarios");
                  ob_enf_fluch();
              }
              else{
                  header("location:index.php");
              }
          }
      }



      #BORRAR USUARIO
      #------------------------------------
      public function borrarUsuarioController(){
        //VALIDO MI ID
        if(isset($_GET["user_id"])){
          $datosController = $_GET["user_id"];
          $respuesta = Crud::borrarUsuarioModel($datosController, "users");
          //Y BORRO MEDIANTE EL CRUD Y UN DELETE LOS DATOS DE USUARIO
          if($respuesta == "success"){
            // ME REDIRIGE A LA VISTA USUARIOS PARA QUE SE ACTUALIZE LA VISTA
            header("location:index.php?action=usuarios");
            ob_enf_fluch();
          }
        }
      }


        #VISTA DE USUARIOS
        #------------------------------------
        public function vistaUsuariosController(){
          $respuesta = Crud::vistaUsuariosModel("users");
          //MANDO A HACER UN SELECT EN MI CRUD PARA TRAER LOS DATOS DE LOS USUARIOOS 
          //Y LOS MUESTRO CADA UNO DE ELLOS EN UN ECHO DENTRO DE UN FOREACH
          foreach($respuesta as $row => $item){
            echo'<tr>
                  
                  <td>'.$item["firstname"].' '.$item["lastname"].'</td>
                  <td>'.$item["user_name"].'</td>
                  <td>'.$item["user_password_hash"].'</td>
                  <td>'.$item["user_email"].'</td>
                  <td>'.$item["date_added"].'</td>
                  <td>
                    <span class="pull-left">
                    <a class="btn btn-small btn-info" href="index.php?action=editarUsuario&user_id='.$item["user_id"].'">
                      <i class="fa fa-edit"></i></a>

                    <a class="btn btn-small btn-danger" href="index.php?action=usuarios&user_id='.$item["user_id"].' ">
                      <i class="fa fa-trash"></i></a>
                    </span>
                  </td>
                  
                </tr>';
          }
        }




      #EDITAR USUARIO
      #------------------------------------
      public function editarUsuarioController(){

        $datosController = $_GET["user_id"];//trae el id
        $respuesta = Crud::editarUsuarioModel($datosController, "users");//manda a llamar los datos en el crud
        //y los muestra en el formulario del siguiente echo
        echo'
        <div class="card-body">

          <div class="form-group row">
            <div class="col-sm-12">
              Nombre(s):<input type="text" class="form-control" value="'.$respuesta["user_id"].'" name="user_id" readonly="readonly">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              Nombre(s):<input type="text" class="form-control" value="'.$respuesta["firstname"].'" name="firstname">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              Apellidos:<input type="text" class="form-control" value="'.$respuesta["lastname"].'" name="lastname">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              Usuario:<input type="text" class="form-control" value="'.$respuesta["user_name"].'" name="user_name">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              Contraseña:<input type="text" class="form-control" value="'.$respuesta["user_password_hash"].'" name="user_password_hash">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              Email:<input type="text" class="form-control" value="'.$respuesta["user_email"].'" name="user_email">
            </div>
          </div>

          
          <div class="card-footer">
            <a href="index.php?action=usuarios&user_id='.$respuesta["user_id"].'"><button type="submit" class="btn btn-secondary">Guardar</button></a>
            <a href="index.php?action=usuarios"><button type="button" class="btn btn-default float-right">Cancel</button></a>
          </div>

        </div>
        
        ';

      }





      #ACTUALIZAR USUARIO
      #------------------------------------
      public function actualizarUsuarioController(){
        //VALIDO MI ID Y METE TODOS MIS DATOS EN UN ARRAY
        if(isset($_POST["firstname"])){
          $datosController = array( "user_id"=>$_POST["user_id"],
                                    "firstname"=>$_POST["firstname"],
                                    "lastname"=>$_POST["lastname"], 
                                    "user_name"=>$_POST["user_name"],
                                    "user_password_hash"=>$_POST["user_password_hash"],
                                    "user_email"=>$_POST["user_email"]);			
          $respuesta = Crud::actualizarUsuarioModel($datosController, "users");
          //PARA POSTERIORMENTE MANDAR ESE ARRAY A MI CRUD Y HACERLE UN UPDATE PARA ACTUALIZAR EN LA BD
          if($respuesta == "success"){
            //ME REDIRIGE A LA VISTA DE USUARIOS
            header("location:index.php?action=usuarios");
            ob_enf_fluch();
          }
          else{
            echo "error";
          }
        }	
      }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


      //REGISTRO DE CATEGORIA
      public function registroCategoriaController(){
        //VALIDO SI ESTA LA CAJA DE TEXTO FIRSTNAME SI ES CORRECTO PROCEDO A GUARDAR LOS DATOS EN
        //UN ARRAY
        if(isset($_POST["nombre_categoria"])){
            $datosController = array( "nombre_categoria"=>$_POST["nombre_categoria"],
                                      "descripcion_categoria"=>$_POST["descripcion_categoria"]);

            $respuesta = Crud::registroCategoriaModel($datosController, "categorias");
            //MANDO A INSERTAR EN LA TABLA MIS DATOS DE CATEGORIA
            if($respuesta == "success"){
               // ME REDIRIGE A LA VISTA CATEGORIA PARA QUE SE ACTUALIZE LA VISTA
                header("location:index.php?action=categorias");
                ob_enf_fluch();
            }
            else{
                header("location:index.php?action=NuevaCategoria");
            }
        }
      }



      #BORRAR CATEGORIA
      #------------------------------------
      public function borrarCategoriasController(){
        //VALIDO MI ID
        if(isset($_GET["id_categoria"])){
          $datosController = $_GET["id_categoria"];
          $respuesta = Crud::borrarCategoriasModel($datosController, "categorias");
          //Y BORRO MEDIANTE EL CRUD Y UN DELETE LOS DATOS DE CATEGORIA
          if($respuesta == "success"){
            // ME REDIRIGE A LA VISTA CATEGORIA PARA QUE SE ACTUALIZE LA VISTA
            header("location:index.php?action=categorias");
            ob_enf_fluch();
          }
        }
      }




      #EDITAR CATEGORIA
      #------------------------------------
      public function editarCategoriaController(){

        $datosController = $_GET["id_categoria"];//trae el id
        $respuesta = Crud::editarCategoriaModel($datosController, "categorias");//manda a llamar los datos en el crud
        //y los muestra en el formulario del siguiente echo
        echo'
        <div class="card-body">

          <div class="form-group row">
            <div class="col-sm-12">
              <input type="text" class="form-control" value="'.$respuesta["id_categoria"].'" name="id_categoria" readonly="readonly">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              Categoria:<input type="text" class="form-control" value="'.$respuesta["nombre_categoria"].'" name="nombre_categoria">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              Descripcion:<input type="text" class="form-control" value="'.$respuesta["descripcion_categoria"].'" name="descripcion_categoria">
            </div>
          </div>

          
          <div class="card-footer">
            <a href="index.php?action=categorias&id_categoria='.$respuesta["id_categoria"].'"><button type="submit" class="btn btn-secondary">Guardar</button></a>
            <a href="index.php?action=categorias"><button type="button" class="btn btn-default float-right">Cancel</button></a>
          </div>

        </div>
        
        ';

      }



      #ACTUALIZAR CATEGORIA
      #------------------------------------
      public function actualizarCategoriaController(){
        //VALIDO MI ID Y METE TODOS MIS DATOS EN UN ARRAY
        if(isset($_POST["nombre_categoria"])){
          $datosController = array( "id_categoria"=>$_POST["id_categoria"],
                                    "nombre_categoria"=>$_POST["nombre_categoria"],
                                    "descripcion_categoria"=>$_POST["descripcion_categoria"]);			
          $respuesta = Crud::actualizarCategoriasModel($datosController, "categorias");
          //PARA POSTERIORMENTE MANDAR ESE ARRAY A MI CRUD Y HACERLE UN UPDATE PARA ACTUALIZAR EN LA BD
          if($respuesta == "success"){
            //ME REDIRIGE A LA VISTA DE CATEGORIA
            header("location:index.php?action=categorias");
            ob_enf_fluch();
          }
          else{
            echo "error";
          }
        }	
      }

      











    }
?>
