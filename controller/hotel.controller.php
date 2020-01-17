<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Hotel.php';

class HotelController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Hotel();
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
        require_once 'view/mostrar_hotel.php';
        require_once 'view/include/pie.php';
    }
    public function Crud(){
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_hotel.php';
        require_once 'view/include/pie.php';
    }

    public function Update(){
        $hotel = new Hotel();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $hotel = $this->model->ObtenerHotel($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista 
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/actualizar_hotel.php';
        require_once 'view/include/pie.php';
    }

    
    
    public function Guardar(){
        $hotel = new Hotel();
        
        //captura todos los datos
        $hotel->nombre = $_REQUEST['txtNombre'];
        $hotel->direccion = $_REQUEST['txtDuracion'];
        $hotel->tipo = $_REQUEST['txtTipo'];
        $hotel->facebook = $_REQUEST['txtClasificacion'];
        $hotel->instagram = $_REQUEST['txtDirector'];
        $hotel->telefono= $_REQUEST['txtReparto'];
        $hotel->descripcion = $_REQUEST['txtDescripcion'];
        $hotel->email = $_REQUEST['txtPrecio'];

       //subir la imagen
        //capturamos los datos del fichero subido    
        $type=$_FILES['txtImagen']['type'];
        $tmp_name = $_FILES['txtImagen']["tmp_name"];
        $name = $_FILES['txtImagen']["name"];
        //Creamos una nueva ruta (nuevo path)
        //Así guardaremos nuestra imagen en la carpeta "Salas"
        $nuevo_path="view/include/".$name;
        //Movemos el archivo desde su ubicación temporal hacia la nueva ruta
        # $tmp_name: la ruta temporal del fichero
        # $nuevo_path: la nueva ruta que creamos
        move_uploaded_file($tmp_name,$nuevo_path);

         //asignamos el nombre de la imagen al atributo.
         $hotel->imagen = $name; 

         // registra la película
         $this->model->RegistrarHotel($hotel);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Hotel&a=Consultar');
    }

    public function Actualizar(){
        $hotel = new Hotel();
        
        //captura todos los datos
        $hotel->idhotel = $_REQUEST['txtIdhotel'];
        $hotel->nombre = $_REQUEST['txtNombre'];
        $hotel->direccion = $_REQUEST['txtDireccion'];
        $hotel->tipo = $_REQUEST['txtTipo'];
        $hotel->facebook = $_REQUEST['txtFacebook'];
        $hotel->instagram = $_REQUEST['txtInstagram'];
        $hotel->telefono= $_REQUEST['txtTelefono'];
        $hotel->descripcion = $_REQUEST['txtDescripcion'];
        $hotel->email = $_REQUEST['txtEmail'];

        //Actualizar
        $this->model->ActualizarHotel($hotel);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Hotel&a=Consultar');
    }     
    
    public function CambiarImagen(){
        $hotel = new Hotel();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $hotel = $this->model->ObtenerSala($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/imagen_sala.php';
        require_once 'view/include/pie.php';
    }

    public function ActualizarImagen(){
        $hotel = new Hotel();
        
        //captura todos los datos        
        $hotel->idhotel = $_REQUEST['txtIdhotel'];
        $hotel->imagen = $_REQUEST['txtNombreImagen'];

        //borrar la imagen existente
        unlink("view/include/".$hotel->imagen);

        //subir la imagen
        $tmp_name = $_FILES['txtImagen']["tmp_name"];
        $name = $_FILES['txtImagen']["name"];
        //Creamos una nueva ruta (nuevo path)
        $nuevo_path="view/include/".$name;
        //Movemos el archivo desde su ubicación temporal hacia la nueva ruta
        move_uploaded_file($tmp_name,$nuevo_path);
                
        //asignamos el nombre de la imagen al atributo.
        $hotel->imagen = $name; 

        // registra la película
        $this->model->CambiarImagen($hotel);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Hotel&a=Consultar');
    } 

    public function CambiarEstado(){
        $this->model->CambiarEstadoHotel($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Hotel&a=Consultar');
    }
}