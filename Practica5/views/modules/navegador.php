<!-- MENU DE ARRIBA -->
<div class="wrapper">
    
    <nav class="main-header navbar navbar-expand navbar-light navbar-white">
      <ul class="navbar-nav ">
        <!-- BOTON QUITAR MENU -->
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

        <!-- BOTON SALIR -->
        <div>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="index.php?action=cerrar_sesion" class="nav-link"><i class="nav-icon fa fa-power-off"></i> Salir</a>
          </li>
        </div>
      </ul>
    </nav>


    
    <!-- MENU IZQUIERDA -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- LOGO DE ADMINLTE -->
        <a href="index.php?action=inicio" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- SESION -->
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block">Aldair Duran</a>
          </div>
        </div>

        <!-- OPCIONES DEL MENU -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <li class="nav-item">
              <a href="index.php?action=inicio" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p> Inicio </p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="index.php?action=usuarios" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p> Usuarios </p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="index.php?action=categorias" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p> Categorías </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?action=inventario" class="nav-link">
                <i class="nav-icon fas fa-boxes"></i>
                <p> Productos </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?action=CrearVenta" class="nav-link">
                <i class="nav-icon fa fa-usd"></i>
                <p> Ventas </p>
              </a>
            </li>
              
            
            
            
           
          </ul>
        </nav> 
          
          

      </div>  
  </aside> 
</div>


