<?php
/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Cliente.php';

class LoginclienController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Usuario
        $this->model = new Cliente();
    }
        
    public function Index(){
        //llama todas las partes de la vista login
        require_once 'view/include/cabecera_login.php';
        require_once 'view/login.1.php';
        require_once 'view/include/pie.php';
    }

    public function Crud(){
        $cliente = new Cliente();
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_cliente.php';
        require_once 'view/registrar_cliente.php';
        require_once 'view/include/pie.php';
    }
    ////////
    public function Crudd(){
        $cliente = new Cliente();
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_cliente.php';
        require_once 'view/registrar_cliente_afuera.php';
        require_once 'view/include/pie.php';
    }
////////////////////////
    public function Entrar(){
        $cliente = new Cliente();
        
        //captura todos los datos
        $email = $_REQUEST['txtEmail'];
        $clave = $_REQUEST['txtContrasena'];

        //consultar los datos
        $cliente = $this->model->entrar($email, $clave);

        //condicionar el inicio de sesión
        if ($cliente != null) {
            #tomar los valores es variables de sesión
            session_start();
            $_SESSION["id"] = $cliente->idcliente;
            $_SESSION["nombre"] = $cliente->nombre;
            $_SESSION["apellido"] = $cliente->apellido;
            $_SESSION["email"] = $cliente->email;
            # entrar
            header('Location: index.php?c=Principalcliente&a=Entrar');
        } else {
            # enviar al login
            header('Location: index.php?c=Loginclien&a=Index');
        }   
        
    }
    public function Guardar(){
        $cliente = new Cliente();
        
        //captura todos los datos
        $cliente->nombre = $_REQUEST['txtNombre'];
        $cliente->apellido = $_REQUEST['txtApellido'];
        $cliente->email = $_REQUEST['txtEmail'];
        $cliente->clave = $_REQUEST['txtClave'];
        $cliente->identificacion = $_REQUEST['txtIdentificacion'];
        $cliente->tarjeta= $_REQUEST['txttarjeta'];
        $cliente->fechavencimientotarjeta = $_REQUEST['txtFechavencimientotarjeta'];

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
         $cliente->imagen = $name; 

         // registra la película
         $this->model->RegistrarCliente($cliente);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Cliente&a=Consultar');
    }

   

    public function CambiarEstado(){
        $this->model->CambiarEstadoCliente($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Cliente&a=Consultar');
    }
}