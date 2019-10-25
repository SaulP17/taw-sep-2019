<?php 
  class Paginas{

    //FUNCION PARA SABER A QUE ENLACE MANDAR AL USUARIO
    public function enlacesPaginasModel($enlaces){

      if($enlaces == "login" || $enlaces == "cerrar_sesion" || $enlaces == "dashboard" 
        || $enlaces == "usuarios" || $enlaces == "categorias" || $enlaces == "inventario" || 
        $enlaces == "navegador" || $enlaces == "inicio" || $enlaces == "NuevaCategoria" || $enlaces == "NuevoUsuario" || $enlaces == "NuevoProducto" || $enlaces == "editarUsuario" || $enlaces == "editarCategorias" || $enlaces == "editarProducto" || $enlaces == "CrearVenta")
      {
        // PEQUEÑO BUG QUE TENIA, SI EL USUARIO CCERRABA SESION E SEGUI APARECIEND EL MENU ASI QUE EL IF QUITA EL MENU CUANDO CIERRE SESION
        if($enlaces == "cerrar_sesion"){
          $module =  "views/modules/".$enlaces.".php";
        }else{
          $module =  "views/modules/".$enlaces.".php";
          include "views/modules/navegador.php";
        }
      }
      else if($enlaces == "index")
      {
        $module =  "views/modules/login.php";
      }
      else if($enlaces == "fallo")
      {
        $module = "views/modules/login.php";
      }
      else
      {
        $module = "views/modules/login.php";
      }		
      return $module;
      
    }
  }
?>