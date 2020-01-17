<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Clinica.php';

class ClinicaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Clinica();
    }
    
    public function Index(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_clientee.php';
        require_once 'view/principal_usuario.php';
        require_once 'view/include/pie.php';
    }

    public function Consultar(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_clientee.php';
        require_once 'view/mostrar_clinica.php';
        require_once 'view/include/pie.php';
    }

    public function Crud(){
        $clinica = new Clinica();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $clinica = $this->model->Obtenerclinica($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_clinica.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $clinica = new Clinica();
        
        //captura todos los datos
        $clinica->nombre = $_REQUEST['txtNombre'];
        $clinica->direccion = $_REQUEST['txtDireccion'];
        $clinica->tipo = $_REQUEST['txtTipo'];
        $clinica->facebook = $_REQUEST['txtFacebook'];
        $clinica->instagram = $_REQUEST['txtInstagram'];
        $clinica->telefono= $_REQUEST['txtTelefono'];
        $clinica->descripcion = $_REQUEST['txtDescripcion'];
        $clinica->email = $_REQUEST['txtEmail'];

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
         $clinica->imagen = $name; 

         // registra la película
         $this->model->RegistrarClinica($clinica);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Cliente&a=Consultar');
    }

   

    public function CambiarEstado(){
        $this->model->CambiarEstadoClinica($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Cliente&a=Consultar');
    }
}