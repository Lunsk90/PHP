<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Pelicula.php';

class PeliculaclienteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Pelicula();
    }
    
    public function Index(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_clientee.php';
        require_once 'view/principal_cliente.php';
        require_once 'view/include/pie.php';
    }

    public function Consultar(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_clientee.php';
        require_once 'view/mostrar_pelicula_cliente.php';
        require_once 'view/include/pie.php';
    }

    public function Crud(){
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_pelicula.php';
        require_once 'view/include/pie.php';
    }
    
    public function Update(){
        $pelicula = new Pelicula();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $pelicula = $this->model->ObtenerPelicula($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista actualizar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/actualizar_pelicula.php';
        require_once 'view/include/pie.php';
    }
    public function Guardar(){
        $pelicula = new Pelicula();
        
        //captura todos los datos
        $pelicula->nombre = $_REQUEST['txtNombre'];
        $pelicula->duracion = $_REQUEST['txtDuracion'];
        $pelicula->tipo = $_REQUEST['txtTipo'];
        $pelicula->clasificacion = $_REQUEST['txtClasificacion'];
        $pelicula->director = $_REQUEST['txtDirector'];
        $pelicula->reparto = $_REQUEST['txtReparto'];
        $pelicula->descripcion = $_REQUEST['txtDescripcion'];
        $pelicula->precio = $_REQUEST['txtPrecio'];

        //subir la imagen
        $type=$_FILES['txtImagen']['type'];//aqui se puede condicionar
        $tmp_name=$_FILES['txtImagen']["tmp_name"];//nombre temporal
        $name=$_FILES['txtImagen']["name"];//nombre de la imagen
        //asi guardamos nuestra imagen
        $nuevo_path="view/include/peliculas/".$name;
        //movemos el archivo de su ubicacion
        move_uploaded_file($tmp_name, $nuevo_path);

        //asignamos el nombre a la imagen atributo
        $pelicula->imagen=$name;

        //registra la pelicula
         $this->model->RegistrarPelicula($pelicula);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Pelicula&a=Consultar');
    }
    public function Actualizar(){
        $pelicula = new Pelicula();
        
        //captura todos los datos
        $pelicula->idpelicula = $_REQUEST['txtIdpelicula'];
        $pelicula->nombre = $_REQUEST['txtNombre'];
        $pelicula->duracion = $_REQUEST['txtDuracion'];
        $pelicula->tipo = $_REQUEST['txtTipo'];
        $pelicula->clasificacion = $_REQUEST['txtClasificacion'];
        $pelicula->director = $_REQUEST['txtDirector'];
        $pelicula->reparto = $_REQUEST['txtReparto'];
        $pelicula->descripcion = $_REQUEST['txtDescripcion'];
        $pelicula->precio = $_REQUEST['txtPrecio'];

        //Actualizar
        $this->model->ActualizarPelicula($pelicula);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Pelicula&a=Consultar');
    }
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoPelicula($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Pelicula&a=Consultar');
    }
}
?>