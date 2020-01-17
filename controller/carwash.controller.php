<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Carwash.php';

class CarwashController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Carwash();
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
        require_once 'view/mostrar_carwash.php';
        require_once 'view/include/pie.php';
    }

    public function Crud(){
        $carwash = new Carwash();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $carwash = $this->model->ObtenerCarwash($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_carwash.php';
        require_once 'view/include/pie.php';
    }

    public function Update(){
        $carwash = new Carwash();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $sala = $this->model->ObtenerCarwash($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista 
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/actualizar_carwash.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $carwash = new Carwash();
        
        //captura todos los datos
        $carwash->nombre = $_REQUEST['txtNombre'];
        $carwash->direccion = $_REQUEST['txtDireccion'];
       // $carwash->tipo = $_REQUEST['txtTipo'];
        $carwash->facebook = $_REQUEST['txtFacebook'];
        $carwash->instagram = $_REQUEST['txtInstagram'];
        $carwash->telefono= $_REQUEST['txtTelefono'];
        $carwash->descripcion = $_REQUEST['txtDescripcion'];
        $carwash->email = $_REQUEST['txtEmail'];

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
        $carwash->imagen = $name; 

        // registra la película
        //$this->model->RegistrarButaca($carwash);
        //si el id es mayor que cero Actualiza si no registra
     //   $carwash->idcar > 0 
          //  ? $this->model->ActualizarButaca($carwash)
         $this->model->RegistrarCarwash($carwash);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Carwash&a=Consultar');
    }
    public function Actualizar(){
        $carwash = new Carwash();
        
        //captura todos los datos
        $carwash->idcar = $_REQUEST['txtIdcar'];
        $carwash->nombre = $_REQUEST['txtNombre'];
        $carwash->direccion = $_REQUEST['txtDireccion'];
        $carwash->facebook = $_REQUEST['txtFacebook'];
        $carwash->instagram = $_REQUEST['txtInstagram'];
        $carwash->telefono= $_REQUEST['txtTelefono'];
        $carwash->descripcion = $_REQUEST['txtDescripcion'];
        $carwash->email = $_REQUEST['txtEmail'];

        //Actualizar
        $this->model->ActualizarCarwash($carwash);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Carwash&a=Consultar');
    }   
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoCarwash($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Carwash&a=Consultar');
    }
}