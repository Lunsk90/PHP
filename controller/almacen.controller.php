<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Almacen.php';

class AlmacenController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Almacen();
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
        require_once 'view/mostrar_almacen.php';
        require_once 'view/include/pie.php';
    }

    public function Crud(){
        $almacen = new Almacen();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $almacen = $this->model->ObtenerAlmacen($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_almacen.php';
        require_once 'view/include/pie.php';
    }

    public function Update(){
        $almacen = new Almacen();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $almacen = $this->model->ObtenerAlmacen($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista 
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/actualizar_almacen.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $almacen = new Almacen();
        
        //captura todos los datos
        $almacen->nombre = $_REQUEST['txtNombre'];
        $almacen->direccion = $_REQUEST['txtDireccion'];
        $almacen->tipo = $_REQUEST['txtTipo'];
        $almacen->facebook = $_REQUEST['txtFacebook'];
        $almacen->instagram = $_REQUEST['txtInstagram'];
        $almacen->telefono= $_REQUEST['txtTelefono'];
        $almacen->descripcion = $_REQUEST['txtDescripcion'];
        $almacen->email = $_REQUEST['txtEmail'];

       //subir la imagen
        //capturamos los datos del fichero subido    
        $type=$_FILES['txtImagen']['type'];
        $tmp_name = $_FILES['txtImagen']["tmp_name"];
        $name = $_FILES['txtImagen']["name"];
        //Creamos una nueva ruta (nuevo path)
        //Así guardaremos nuestra imagen en la carpeta "peliculas"
        $nuevo_path="view/include/".$name;
        //Movemos el archivo desde su ubicación temporal hacia la nueva ruta
        # $tmp_name: la ruta temporal del ficheroº<0.


        # $nuevo_path: la nueva ruta que creamos
        move_uploaded_file($tmp_name,$nuevo_path);

         //asignamos el nombre de la imagen al atributo.
         $almacen->imagen = $name; 

         // registra la película
         $this->model->RegistrarAlmacen($almacen);
        //redirecciona a la vista index
        header('Location: index.php?c=Almacen&a=Consultar');
    }

    public function Actualizar(){
        $almacen = new Almacen();
        
        //captura todos los datos
        $almacen->idalmacen = $_REQUEST['txtIdalmacen'];
        $almacen->nombre = $_REQUEST['txtNombre'];
        $almacen->direccion = $_REQUEST['txtDireccion'];
        $almacen->tipo = $_REQUEST['txtTipo'];
        $almacen->facebook = $_REQUEST['txtFacebook'];
        $almacen->instagram = $_REQUEST['txtInstagram'];
        $almacen->telefono= $_REQUEST['txtTelefono'];
        $almacen->descripcion = $_REQUEST['txtDescripcion'];
        $almacen->email = $_REQUEST['txtEmail'];

        //Actualizar
        $this->model->ActualizarAlmacen($almacen);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Almacen&a=Consultar');
    }     
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoAlmacen($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Almacen&a=Consultar');
    }
}