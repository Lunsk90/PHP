<?php
 //validar la sesión
 /*session_start();
  if(!isset($_SESSION["id"])){
    header('Location: index.php?c=Loginclien&a=Entrar');
  }*/ 
?>
<!DOCTYPE html>
<html lang="es">
<head>  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Bienvenid@</title>

  <!-- CSS  -->
  <link href="materializecss/css/icon.css" rel="stylesheet">
  <link href="materializecss/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="materializecss/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
  <!-- opciones del menú registrar-->
  <nav class="#1a237e indigo darken-4" role="navigation">
      <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo" title="Inicio."><i class="large material-icons">home</i></a>
        <ul class="right hide-on-med-and-down">
        <li><a class="white-text"  title="Iniciar Cliente" href="?c=Loginclien&a=Index" ><i class="material-icons right">person_pin</i></a></li>
        <li><a class="white-text" title="Iniciar Usuario" href="?c=Login&a=Index" ><i class="material-icons right">person_pin</i></a></li>   
        <li><a class="white-text" href="?c=Loginclien&a=Crudd" >Registrarse<i class="material-icons right">person_add</i></a></li>
 
        </ul>
        <ul id="nav-mobile" class="sidenav green darken-3">
        <li class="center"><i class="material-icons white-text">movie_filter</i></li>
        <li><a class="white-text" href="index.php" title="Inicio"><i class="material-icons white-text">home</i> Inicio</a></li>
        <li><a class="white-text" href="?c=Loginclien&a=Index" title="Inicio"><i class="material-icons white-text">person_pin</i> Iniciar Cliente</a></li>
        <li><a class="white-text" href="?c=Login&a=Index" title="Inicio"><i class="material-icons white-text">person_pin</i> Iniciar Usuario</a></li>
  
        <li><a class="white-text" href="?c=Loginclien&a=Crudd" >Registrarse<i class="material-icons white-text">person_add</i></a></li>
        </ul>

      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
