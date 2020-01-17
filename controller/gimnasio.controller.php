<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Gimnasio.php';

class GimnasioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Gimnasio();
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
        require_once 'view/mostrar_gimnasio.php';
        require_once 'view/include/pie.php';
    }
    public function Crud(){
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_gimnasio.php';
        require_once 'view/include/pie.php';
    }

    public function Update(){
        $gimnasio = new Gimnasio();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $gimnasio = $this->model->ObtenerGimnasio($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista 
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/actualizar_gimnasio.php';
        require_once 'view/include/pie.php';
    }
    
    
    public function Guardar(){
        $gimnasio = new Gimnasio();
        
        //captura todos los datos
        $gimnasio->nombre = $_REQUEST['txtNombre'];
        $gimnasio->direccion = $_REQUEST['txtDireccion'];
        $gimnasio->facebook = $_REQUEST['txtFacebook'];
        $gimnasio->instagram = $_REQUEST['txtInstagram'];
        $gimnasio->telefono= $_REQUEST['txtTelefono'];
        $gimnasio->descripcion = $_REQUEST['txtDescripcion'];
        $gimnasio->email = $_REQUEST['txtEmail'];

       //subir la imagen
        //capturamos los datos del fichero subido    
        $type=$_FILES['txtImagen']['type'];
        $tmp_name = $_FILES['txtImagen']["tmp_name"];
        $name = $_FILES['txtImagen']["name"];
        //Creamos una nueva ruta (nuevo path)
        //Así guardaremos nuestra imagen en la carpeta "peliculas"
        $nuevo_path="view/include/".$name;
        //Movemos el archivo desde su ubicación temporal hacia la nueva ruta
        # $tmp_name: la ruta temporal del fichero
        # $nuevo_path: la nueva ruta que creamos
        move_uploaded_file($tmp_name,$nuevo_path);

         //asignamos el nombre de la imagen al atributo.
         $gimnasio->imagen = $name; 

         // registra la película
         $this->model->RegistrarGimnasio($gimnasio);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Gimnasio&a=Consultar');
    }
    public function Actualizar(){
        $gimnasio = new Gimnasio();
        
        //captura todos los datos
        $gimnasio->idgim = $_REQUEST['txtIdgim'];
        $gimnasio->nombre = $_REQUEST['txtNombre'];
        $gimnasio->direccion = $_REQUEST['txtDireccion'];
        $gimnasio->facebook = $_REQUEST['txtFacebook'];
        $gimnasio->instagram = $_REQUEST['txtInstagram'];
        $gimnasio->telefono= $_REQUEST['txtTelefono'];
        $gimnasio->descripcion = $_REQUEST['txtDescripcion'];
        $gimnasio->email = $_REQUEST['txtEmail'];

        //Actualizar
        $this->model->ActualizarGimnasio($gimnasio);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Gimnasio&a=Consultar');
    }     
   

    public function CambiarEstado(){
        $this->model->CambiarEstadoGimnasio($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Gimnasio&a=Consultar');
    }
}