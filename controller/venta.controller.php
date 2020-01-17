<?php

/*
Lo que el controlador hace es interactuar con el usuario
- Este manda peticiones al servidor 
- Manda la información al modelo
- Carga las vistas como respuesta al usuario
*/
require_once 'model/Venta.php';

class VentaController{

private $model;

public function __CONSTRUCT(){
    //inicializa el modelo venta
    $this->model = new Venta();
}

public function Index(){
    //llama todas las partes de la vista principal
    require_once 'view/include/cabecera_usuario.php';
    require_once 'view/principal_usuario.php';
    require_once 'view/include/pie.php';
}

public function Consultar(){
    //llama todas las partes de la vista principal
    require_once 'view/include/cabecera_usuario.php';
    require_once 'view/mostrar_venta.php';
    require_once 'view/include/pie.php';
}

public function Crud(){
    //llama todas las partes de la vista guardar
    require_once 'view/include/cabecera_usuario.php';
    require_once 'view/registrar_venta.php';
    require_once 'view/include/pie.php';

}
public function Update(){
    $venta = new Venta();

if(isset($_REQUEST['id'])){
    //si tiene el parámetro asignado ejecutamos el método
    $venta = $this->model->ObtenerVenta($_REQUEST['id']);
} 
    //llama todas las partes de la vista actualizar
    require_once 'view/include/cabecera_usuario.php';
    require_once 'view/actualizar_venta.php';
    require_once 'view/include/pie.php';
}

public function Guardar(){
    $venta = new Venta();
     //captura todos los datos
     $venta->idventa = $_REQUEST['txtcodigo'];
     $venta->fechaventa = $_REQUEST['txtfecha'];
     $venta->idusuario = $_REQUEST['txtcodigousu'];
     $venta->idcliente = $_REQUEST['txtcodigocli'];

     //registra la pelicula
     $this->model->RegistrarVenta($venta);
     //redirecciona a la vista index
    header('Location: index.php?c=Venta&a=Consultar');
}
public function Actualizar(){
    $venta = new Venta();
    
    //captura todos los datos
    $venta->idventa = $_REQUEST['txtcodigo'];
    $venta->fechaventa = $_REQUEST['txtfecha'];
    $venta->idusuario = $_REQUEST['txtcodigousu'];
    $venta->idcliente = $_REQUEST['txtcodigocli'];

    //Actualizar
    $this->model->ActualizarVenta($venta);
    
    //redirecciona a la vista index 
    header('Location: index.php?c=Venta&a=Consultar');
}

public function CambiarEstado(){
    $this->model->CambiarEstadoVenta($_REQUEST['nuevo_estado'],$_REQUEST['id']);
    header('Location: index.php?c=Venta&a=Consultar');
}
}
?>