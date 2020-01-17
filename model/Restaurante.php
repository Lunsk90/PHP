<?php
class Restaurante
{
	private $pdo;
    
    public $idrestaurante;
    public $nombre;
    public $imagen;
    public $direccion;
    public $tipo;
    public $facebook;
    public $instagram;
    public $telefono;
    public $descripcion;
    public $email;
    public $estado;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Conexion::Conectar();     
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function ListarRestauranteActivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM restaurante WHERE estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function ListarRestauranteInactivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM restaurante WHERE estado = 0");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function ObtenerRestaurante($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM restaurante WHERE idrestaurante = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}
	

	public function CambiarEstadoRestaurante($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE restaurante SET 
						estado      = ?
				    WHERE idrestaurante = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $nuevo_estado,
                        $id
					)
				);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function ActualizarRestaurante($data)
	{
		try 
		{
			$sql = "UPDATE restaurante SET 
						 nombre        = ?, 
						direccion      = ?,
                         tipo          = ?, 
						      facebook = ?,
					  instagram        = ?,
                         telefono      = ?, 
						   email       = ?,
                         descripcion   = ?
				    WHERE idrestaurante = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->direccion,
                        $data->tipo,
                        $data->facebook,
                        $data->instagram,
                        $data->telefono,
                        $data->email,
                        $data->descripcion,
                        $data->idrestaurante
					)
				);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function CambiarImagen($data)
	{
		try 
		{
			$sql = "UPDATE restaurante SET 
                        imagen   = ?
				    WHERE idrestaurante = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->imagen,
                        $data->idrestaurante
					)
				);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function RegistrarRestaurante($data)
	{
		try 
		{
		$sql = "INSERT INTO restaurante (nombre, imagen, direccion,tipo,facebook,instagram,telefono,descripcion,email) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(             
                    $data->nombre,
                    $data->imagen,  
                    $data->direccion,
                    $data->tipo,
                    $data->facebook,
                    $data->instagram,
                    $data->telefono,
                    $data->descripcion,
                    $data->email
                )
			);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage()); 
		}
	}

}