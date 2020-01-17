<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Restaurante.php';

class RestauranteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo 
        $this->model = new Restaurante();
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
        require_once 'view/mostrar_restaurante.php';
        require_once 'view/include/pie.php';
    }

    public function Crud(){
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_restaurante.php';
        require_once 'view/include/pie.php';
    }

    public function Update(){
        $restaurante = new Restaurante();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $restaurante = $this->model->ObtenerRestaurante($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista 
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/actualizar_restaurante.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $restaurante = new Restaurante();
        
        //captura todos los datos
        $restaurante->nombre = $_REQUEST['txtNombre'];
        $restaurante->direccion = $_REQUEST['txtDireccion'];
        $restaurante->tipo = $_REQUEST['txtTipo'];
        $restaurante->facebook = $_REQUEST['txtFacebook'];
        $restaurante->instagram = $_REQUEST['txtInstagram'];
        $restaurante->telefono= $_REQUEST['txtTelefono'];
        $restaurante->descripcion = $_REQUEST['txtDescripcion'];
        $restaurante->email = $_REQUEST['txtEmail'];

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
        $restaurante->imagen = $name; 

        // registra la película
        $this->model->RegistrarRestaurante($restaurante);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Restaurante&a=Consultar');
    } 
    
    public function Actualizar(){
        $restaurante = new Restaurante();
        
        //captura todos los datos
        $restaurante->idrestaurante = $_REQUEST['txtIdrestaurante'];
        $restaurante->nombre = $_REQUEST['txtNombre'];
        $restaurante->direccion = $_REQUEST['txtDireccion'];
        $restaurante->tipo = $_REQUEST['txtTipo'];
        $restaurante->facebook = $_REQUEST['txtFacebook'];
        $restaurante->instagram = $_REQUEST['txtInstagram'];
        $restaurante->telefono= $_REQUEST['txtTelefono'];
        $restaurante->descripcion = $_REQUEST['txtDescripcion'];
        $restaurante->email = $_REQUEST['txtEmail'];

        //Actualizar
        $this->model->ActualizarRestaurante($restaurante);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Restaurante&a=Consultar');
    }     
    
    public function CambiarImagen(){
        $restaurante = new Restaurante();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $restaurante = $this->model->ObtenerRestaurante($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/imagen_pelicula.php';
        require_once 'view/include/pie.php';
    }

    public function ActualizarImagen(){
        $restaurante = new Restaurante();
        
        //captura todos los datos        
        $restaurante->idrestaurante = $_REQUEST['txtIdpelicula'];
        $restaurante->imagen = $_REQUEST['txtNombreImagen'];

        //borrar la imagen existente
        unlink("view/include/".$restaurante->imagen);

        //subir la imagen
        $tmp_name = $_FILES['txtImagen']["tmp_name"];
        $name = $_FILES['txtImagen']["name"];
        //Creamos una nueva ruta (nuevo path)
        $nuevo_path="view/include/".$name;
        //Movemos el archivo desde su ubicación temporal hacia la nueva ruta
        move_uploaded_file($tmp_name,$nuevo_path);
                
        //asignamos el nombre de la imagen al atributo.
        $restaurante->imagen = $name; 

        // registra la película
        $this->model->CambiarImagen($restaurante);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Restaurante&a=Consultar');
    } 
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoRestaurante($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Restaurante&a=Consultar');
    }
}