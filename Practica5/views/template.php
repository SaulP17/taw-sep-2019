<!DOCTYPE html>
<html lang="en">
<head>
<title>Inventario | MVC</title>
	<meta charset="UTF-8">
  <link rel="shortcut icon" href="assets/images/favicon.ico">
  <!--  Importación de estilos  -->
	<link rel="stylesheet" type="text/css" href="views/modules/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="views/modules/assets/css/icons.css">
  <link rel="stylesheet" type="text/css" href="views/modules/assets/css/icons.map">
  <link rel="stylesheet" type="text/css" href="views/modules/assets/css/metismenu.min.css">
	<link rel="stylesheet" type="text/css" href="views/modules/assets/css/style.css.">    
  <link rel="stylesheet" type="text/css" href="views/modules/assets/css/style_cl.css">    
  <link rel="stylesheet" type="text/css" href="views/modules/assets/css/style_dark.css">  
  <link rel="stylesheet" type="text/css" href="views/modules/assets/scss/layout.scss">      
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
</head>

<body  class="hold-transition sidebar-mini layout-fixed">

  <?php
    //crea objeto y llama a la funcion para saber que es lo que mostrara
    $mvc = new MvcController();
    $mvc -> enlacesPaginasController();
  ?>

  <!--Importación de JS's  -->
  <script  src="views/modules/assets/js/modernizr.min.js"></script>    
  <script  src="views/modules/assets/js/bootstraop.min.js"></script>
  <script  src="views/modules/assets/js/jquery.app.js"></script>
  <script  src="views/modules/assets/js/jquery.core.js"></script>
  <script  src="views/modules/assets/js/jquery.min.js"></script>
  <script  src="views/modules/assets/js/jquery.slimscroll.js"></script>
  <script  src="views/modules/assets/js/metisMenu.min.js"></script>
  <script  src="views/modules/assets/js/modernizr.min.js"></script>
  <script  src="views/modules/assets/js/popper.min.js"></script>
  <script  src="views/modules/assets/js/waves.js"></script>
  <script  src="views/modules/assets/js/wow.min.js"></script>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.world.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  
</body>
</html>