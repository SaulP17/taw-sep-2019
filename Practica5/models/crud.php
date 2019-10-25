<?php
  
  require_once "conexion.php";//manda a llamar a la conexion de la base de datos

  //creacion de una clase que extiende una clase llamada conexion del archivo conexion llamado anteriormente
  class Crud extends Conexion
  {
      //FUNCION PARA HACER LA CONSULTA DE LOS DATOS EN LA BASE DE DATOS PARA EL LOGIN
      public function iniciarModel($datosModel, $tabla){
        //PREPARO EL SELECT CON MIS DATOS P
          $stmt = Conexion::conectar()->prepare("SELECT  user_name, user_password_hash FROM $tabla WHERE user_name = :user_name");	

          $stmt->bindParam(":user_name", $datosModel["user_name"], PDO::PARAM_STR);

          $stmt->execute(); 
          return $stmt->fetch();
          $stmt->close();
      }



      //REGISTROS DE USUARIOS
      public function registroUsuarioModel($datosModel, $tabla){
        //INSERTO MIS DATOS A LA BASE DE DATOS MEDIANTE UN INSERT
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (firstname,lastname,user_name,user_password_hash,user_email) VALUES (:firstname,:lastname,:user_name,:user_password_hash,:user_email)");	
        
        $stmt->bindParam(":firstname", $datosModel["firstname"], PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $datosModel["lastname"], PDO::PARAM_STR);
        $stmt->bindParam(":user_name", $datosModel["user_name"], PDO::PARAM_STR);
        $stmt->bindParam(":user_password_hash", $datosModel["user_password_hash"], PDO::PARAM_STR);
        $stmt->bindParam(":user_email", $datosModel["user_email"], PDO::PARAM_STR);
        //SI SE EJECUTA TODO SIN PROBLEMAS VA RETURNAR SUCCESS PARA REGRESAR A LA VISTA DE USUARIOS
        if($stmt->execute()){    
            return "success";
        }
        else{
            return "error";
        }
        $stmt->close();
    }
    
    
    
    #VISTA USUARIOS
        #-------------------------------------

        public function vistaUsuariosModel($tabla){
          //PREPARO EL SELECT PARA DARLE VISTA A LOS USUARIOS REGISTRADOS
          $stmt = Conexion::conectar()->prepare("SELECT user_id, firstname, lastname, user_name, user_password_hash, user_email, date_added FROM $tabla");	
          $stmt->execute();

          #fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
          return $stmt->fetchAll();

          $stmt->close();

      }




      #VISTA CATEGORIAS
        #-------------------------------------

        public function vistaCategoriasModel($tabla){
          //PREPARO UN SELECT PARA DAR VISTA A MIS CATEGORIAS POSTERIORIMETE REGISTRADAS
          $stmt = Conexion::conectar()->prepare("SELECT id_categoria, nombre_categoria, descripcion_categoria, date_added FROM $tabla");	
          $stmt->execute();

          #fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
          return $stmt->fetchAll();

          $stmt->close();

      }
    
      
          #VISTA SELECTCATEGORIAS
        #-------------------------------------

        public function vistaSelectCategoriasModel($tabla){
          //PREPARO EL SELECT PARA DARLE VISTA A LOS USUARIOS REGISTRADOS
          $stmt = Conexion::conectar()->prepare("SELECT id_categoria,nombre_categoria FROM $tabla");	
          $stmt->execute();

          #fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
          return $stmt->fetchAll();

          $stmt->close();

      }




      #VISTA PRODUCTOS
        #-------------------------------------

        public function vistaProductosModel($tabla){
          // PREPARO MI SELECT PARA VISUALZAR LOS PRODUCTOS YA REGISTRADOS
          $stmt = Conexion::conectar()->prepare("SELECT id_producto, codigo_producto, nombre_producto, date_added, precio_producto, stock FROM $tabla");	
          //$stmt = Conexion::conectar()->prepare("SELECT P.id_producto, P.codigo_producto, P.nombre_producto, C.nombre_categoria, P.date_added, P.precio_producto, P.stock FROM $tabla P INNER JOIN categorias C ON A.id_categoria = C.id_categ ");	
          $stmt->execute();

          #fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
          return $stmt->fetchAll();

          $stmt->close();

      }
      #VISTA PRODUCTOS VENTA
      public function vistaProductosVModel($tabla){
          // PREPARO MI SELECT PARA VISUALZAR LOS PRODUCTOS YA REGISTRADOS
          $stmt = Conexion::conectar()->prepare("SELECT id_producto, nombre_producto, precio_producto ,stock FROM $tabla");	
          //$stmt = Conexion::conectar()->prepare("SELECT P.id_producto, P.codigo_producto, P.nombre_producto, C.nombre_categoria, P.date_added, P.precio_producto, P.stock FROM $tabla P INNER JOIN categorias C ON A.id_categoria = C.id_categ ");	
          $stmt->execute();

          #fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
          return $stmt->fetchAll();

          $stmt->close();
      }
    
      #-------------------------------------

      



    #BORRAR USUARIO
    #------------------------------------
    public function borrarUsuarioModel($datosModel, $tabla){
      //HAGO UN DELETE PARA BORRAR LOS USUARIOS QUE SELECIONE
      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE user_id = :user_id");
      $stmt->bindParam(":user_id", $datosModel, PDO::PARAM_INT);
       //SI SE EJECUTA TODO SIN PROBLEMAS VA RETURNAR SUCCESS PARA REGRESAR A LA VISTA DE USUARIOS
      if($stmt->execute()){
        return "success";
      }
      else{
        return "error";
      }
      $stmt->close();
    }



   

    #EDITAR USUARIO
    #-------------------------------------
    public function editarUsuarioModel($datosModel, $tabla){
      // HAGO UNA CONSULTA PARA TRAER LOS DATOS DE LA BASE DE DATOS Y MOSTRARLOS EN EL FORMULARIO DE EDITAR USUARIO
      $stmt = Conexion::conectar()->prepare("SELECT user_id, firstname, lastname, user_name, user_password_hash, user_email FROM $tabla WHERE user_id = :user_id");
      $stmt->bindParam(":user_id", $datosModel, PDO::PARAM_INT);	
      $stmt->execute();
      
      return $stmt->fetch();

      $stmt->close();

    }





    

    #ACTUALIZAR USUARIO
    #-------------------------------------
    public function actualizarUsuarioModel($datosModel, $tabla){
      //UNA VEZ EDITADOS LOS DATOS, LOS MANDO A LA BASE DE DATOS Y LE HAGO UN UPDATE PARA GUARDARLOS EN ELLA
      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET firstname = :firstname, lastname = :lastname, user_name = :user_name, user_password_hash = :user_password_hash, user_email = :user_email  WHERE user_id = :user_id");

      $stmt->bindParam(":firstname", $datosModel["firstname"], PDO::PARAM_STR);
      $stmt->bindParam(":lastname", $datosModel["lastname"], PDO::PARAM_STR);
      $stmt->bindParam(":user_name", $datosModel["user_name"], PDO::PARAM_STR);
      $stmt->bindParam(":user_password_hash", $datosModel["user_password_hash"], PDO::PARAM_STR);
      $stmt->bindParam(":user_email", $datosModel["user_email"], PDO::PARAM_STR);
      $stmt->bindParam(":user_id", $datosModel["user_id"], PDO::PARAM_INT);
      //SI SE EJECUTA TODO SIN PROBLEMAS VA RETURNAR SUCCESS PARA REGRESAR A LA VISTA DE USUARIOS
      if($stmt->execute()){
        return "success";
      }
      else{
        return "error";
      }
      $stmt->close();
    }




    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //REGISTROS DE USUARIOS
    public function registroCategoriaModel($datosModel, $tabla){
      //INSERTO MIS DATOS A LA BASE DE DATOS MEDIANTE UN INSERT
      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_categoria,descripcion_categoria) VALUES (:nombre_categoria,:descripcion_categoria)");	
      
      $stmt->bindParam(":nombre_categoria", $datosModel["nombre_categoria"], PDO::PARAM_STR);
      $stmt->bindParam(":descripcion_categoria", $datosModel["descripcion_categoria"], PDO::PARAM_STR);
      //SI SE EJECUTA TODO SIN PROBLEMAS VA RETURNAR SUCCESS PARA REGRESAR A LA VISTA DE USUARIOS
      var_dump($stmt);
      if($stmt->execute()){    
          return "success";
      }
      else{
          return "error";
      }
      $stmt->close();
    }




    #BORRAR USUARIO
    #------------------------------------
    public function borrarCategoriasModel($datosModel, $tabla){
      //HAGO UN DELETE PARA BORRAR LOS USUARIOS QUE SELECIONE
      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria = :id_categoria");
      $stmt->bindParam(":id_categoria", $datosModel, PDO::PARAM_INT);
       //SI SE EJECUTA TODO SIN PROBLEMAS VA RETURNAR SUCCESS PARA REGRESAR A LA VISTA DE USUARIOS
      if($stmt->execute()){
        return "success";
      }
      else{
        return "error";
      }
      $stmt->close();
    }


    #EDITAR USUARIO
    #-------------------------------------
    public function editarCategoriaModel($datosModel, $tabla){
      // HAGO UNA CONSULTA PARA TRAER LOS DATOS DE LA BASE DE DATOS Y MOSTRARLOS EN EL FORMULARIO DE EDITAR USUARIO
      $stmt = Conexion::conectar()->prepare("SELECT id_categoria, nombre_categoria, descripcion_categoria FROM $tabla WHERE id_categoria = :id_categoria");
      $stmt->bindParam(":id_categoria", $datosModel, PDO::PARAM_INT);	
      $stmt->execute();
      
      return $stmt->fetch();

      $stmt->close();

    }





    #ACTUALIZAR USUARIO
    #-------------------------------------
    public function actualizarCategoriasModel($datosModel, $tabla){
      //UNA VEZ EDITADOS LOS DATOS, LOS MANDO A LA BASE DE DATOS Y LE HAGO UN UPDATE PARA GUARDARLOS EN ELLA
      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_categoria = :nombre_categoria, descripcion_categoria = :descripcion_categoria  WHERE id_categoria = :id_categoria");

      $stmt->bindParam(":nombre_categoria", $datosModel["nombre_categoria"], PDO::PARAM_STR);
      $stmt->bindParam(":descripcion_categoria", $datosModel["descripcion_categoria"], PDO::PARAM_STR);
      $stmt->bindParam(":id_categoria", $datosModel["id_categoria"], PDO::PARAM_STR);
      
      //SI SE EJECUTA TODO SIN PROBLEMAS VA RETURNAR SUCCESS PARA REGRESAR A LA VISTA DE USUARIOS
      if($stmt->execute()){
        return "success";
      }
      else{
        return "error";
      }
      $stmt->close();
    }




    #------------INVENTARIO
    
    #EDITAR INVENTARIO
    #-------------------------------------
    public function editarProductoModel($datosModel,$tabla){
      // HAGO UNA CONSULTA PARA TRAER LOS DATOS DE LA BASE DE DATOS Y MOSTRARLOS EN EL FORMULARIO DE EDITAR USUARIO
      $stmt = Conexion::conectar()->prepare("SELECT id_producto, codigo_producto,nombre_producto, precio_producto, stock, id_categoria FROM $tabla WHERE id_producto = :id_producto");
      $stmt->bindParam(":id_producto", $datosModel, PDO::PARAM_INT);	
      $stmt->execute();
 
        return $stmt->fetch();

        $stmt->close();
    }

    #BORRAR INVENTARIO
    #------------------------------------
    public function borrarProdcutosModel($datosModel, $tabla){
      //HAGO UN DELETE PARA BORRAR LOS USUARIOS QUE SELECIONE
      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :id_producto");
      $stmt->bindParam(":id_producto", $datosModel, PDO::PARAM_INT);
       //SI SE EJECUTA TODO SIN PROBLEMAS VA RETURNAR SUCCESS PARA REGRESAR A LA VISTA DE USUARIOS
      if($stmt->execute()){
        return "success";
      }
      else{
        return "error";
      }
      $stmt->close();
    }
    
    
    
    
      //REGISTROS DE PRODUCTOS
   public function registroProdcutosModel($datosModel, $tabla){
    //INSERTO MIS DATOS A LA BASE DE DATOS MEDIANTE UN INSERT
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo_producto,nombre_producto,precio_producto,stock,id_categoria) VALUES (:codigo_producto,:nombre_producto,:precio_producto,:stock,:id_categoria)");	
    
    $stmt->bindParam(":codigo_producto", $datosModel["codigo_producto"], PDO::PARAM_STR);
    $stmt->bindParam(":nombre_producto", $datosModel["nombre_producto"], PDO::PARAM_STR);
    $stmt->bindParam(":precio_producto", $datosModel["precio_producto"], PDO::PARAM_STR);
    $stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_STR);
    $stmt->bindParam(":id_categoria", $datosModel["id_categoria"], PDO::PARAM_STR);
    //SI SE EJECUTA TODO SIN PROBLEMAS VA RETURNAR SUCCESS PARA REGRESAR A LA VISTA DE USUARIOS
    if($stmt->execute()){    
        return "success";
    }
    else{
        return "error";
    }
    $stmt->close();
}
    
    
    #------------INVENTARIO
    
    
    
  }


?>