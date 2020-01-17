<?php
  //validar la sesión
 // @session_start();
  //if(!isset($_SESSION["id"])){
   // header('Location: index.php?c=Login&a=Index');
  //}
?>
<!DOCTYPE html>
<html lang="es">
<head>  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>PubliCenter</title>

  <!-- CSS  -->
  <link href="materializecss/css/icon.css" rel="stylesheet">
  <link href="materializecss/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="materializecss/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>

<!-- opciones del menú usuario-->
<ul id="usuario" class="dropdown-content">
  <li><a href="?c=Usuario&a=ActualizarClave">Cambiar Clave</a></li>
  <li class="divider"></li>
  <li><a href="index.php" title="<?php echo $_SESSION["email"]; ?>">Salir</a></li>
</ul>

  <!-- opciones del menú registrar-->
  <ul id="registro" class="dropdown-content">
  <li><a href="?c=Restaurante&a=Crud">Restaurantes</a></li>
    <li class="divider"></li>
    <li><a href="?c=Hotel&a=Crud">Hoteles</a></li>
    <li class="divider"></li>
    <li><a href="?c=Carwas&a=Crud">Car-Wash</a></li>
    <li class="divider"></li>
    <li><a href="?c=Almacen&a=Crud">Horarios</a></li>
    <li class="divider"></li>
    <li><a href="?c=Gimnasio&a=Crud">Gimnasio</a></li>
    <li class="divider"></li>
    <li><a href="?c=Clinica&a=Crud">Consultorio Medico</a></li>
  </ul>
  
  <!-- opciones del menú consultar-->
  <ul id="consulta" class="dropdown-content">
    <li><a href="?c=Hotel&a=Consultar">Hoteles</a></li>
    <li class="divider"></li>
    <li><a href="?c=Carwash&a=Consultar">Butacas</a></li>
    <li class="divider"></li>
    <li><a href="?c=Restaurante&a=Consultar">Películas</a></li>
    <li class="divider"></li>
    <li><a href="?c=Almacen&a=Consultar">Horarios</a></li>
    <li class="divider"></li>
    <li><a href="?c=Gimnasio&a=Consultar">Gimnasio</a></li>
    <li class="divider"></li>
    <li><a href="?c=Clinica&a=Consultar">Consultorio Medico</a></li>
  </ul>


  <!-- para el nav-bar-->  
<!-- opciones del menú usuario-->
<ul id="usuario-m" class="dropdown-content">
  <li><a href="?c=Usuario&a=ActualizarClave">Cambiar Clave</a></li>
  <li class="divider"></li>
  <li><a href="index.php" title="<?php echo $_SESSION["email"]; ?>">Salir</a></li>
</ul>
  <!-- opciones del menú registrar-->
  <ul id="registro-m" class="dropdown-content ">
  <li><a href="?c=Restaurante&a=Crud">Restaurantes </a></li>
    <li class="divider"></li>
    <li><a href="?c=Hotel&a=Crud">Hosteleria</a></li>
    <li class="divider"></li>
    <li><a href="?c=Carwash&a=Crud">Car Wash</a></li>
    <li class="divider"></li>
    <li><a href="?c=Almacen&a=Crud">Almacenes</a></li>
    <li class="divider"></li>
    <li><a href="?c=Gimnasio&a=Crud">Gimnacios</a></li>
    <li class="divider"></li>
    <li><a href="?c=Clinica&a=Crud">Consultorio médico</a></li>
  </ul>
  
  <!-- opciones del menú consultar-->
  <ul id="consulta-m" class="dropdown-content">
    <li><a href="?c=Hotel&a=Consultar">Hosteleria</a></li>
    <li class="divider"></li>
    <li><a href="?c=Carwash&a=Consultar">Car Wash</a></li>
    <li class="divider"></li>
    <li><a href="?c=Restaurante&a=Consultar">Restaurantes</a></li>
    <li class="divider"></li>
    <li><a href="?c=Almacen&a=Consultar">Almacenes</a></li>
    <li class="divider"></li>
    <li><a href="?c=Gimnasio&a=Consultar">Gimnasios</a></li>
    <li class="divider"></li>
    <li><a href="?c=Clinica&a=Consultar">Consultorio Medico</a></li>
  </ul>

  
      <ul id="nav-mobile" class="sidenav grey darken-2">
        <li><a href="?c=Principal&a=Index" title="Inicio"><i class="material-icons white-text">home</i></a></li>
        <!-- para el menú registro -->
        <li><a class="white-text" title="Iniciar Usuario" href="?c=Login&a=Index" >Categorias<i class="material-icons center">person_pin</i></a></li>
        <li><a class="dropdown-trigger white-text" href="#!" data-target="registro-m">Registrar Empresa<i class="material-icons right white-text">arrow_drop_down</i></a></li>
        <!-- para el menú cosulta -->
        <li><a class="dropdown-trigger white-text" href="#!" data-target="consulta-m">Consultar Empresa<i class="material-icons right white-text">arrow_drop_down</i></a></li>
       
       
        <li><a href="index.php" title="<?php echo $_SESSION["email"]; ?>"><i class="material-icons white-text">settings_power</i></a></li>
        
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>