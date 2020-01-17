<?php
class Hotel
{
	private $pdo;
	
    public $idhotel;
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

	public function ListarHotelActivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM hotel WHERE estado = 1");
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

	public function ListarHotelInactivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM hotel WHERE estado = 0");
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

	public function ObtenerHotel($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM hotel WHERE idhotel = ?");
			          

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

	// public function Listar($id)
	// {
	// 	try 
	// 	{
	// 		$stm = $this->pdo
	// 		          ->prepare("SELECT * FROM hotel as b WHERE b.idbutaca = ?");
			          

	// 		$stm->execute(array($id));
	// 		return $stm->fetchall(PDO::FETCH_OBJ);
	// 	}
    //     catch (Throwable $t)//php7
    //     {
	// 		die($t->getMessage());
    //     }
	// 	catch(Exception $e)//php5
	// 	{
	// 		die($e->getMessage());
	// 	}
	// }
	

	public function CambiarEstadoHotel($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE hotel SET 
						estado      = ?
				    WHERE idhotel  = ?";

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

	public function ActualizarHotel($data)
	{
		try 
		{
			$sql = "UPDATE hotel SET 
						 nombre        = ?, 
						direccion      = ?,
                         tipo          = ?, 
						      facebook = ?,
					  instagram        = ?,
                         telefono      = ?, 
						   email       = ?,
                         descripcion   = ?
				    WHERE idhotel = ?";

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
                        $data->idhotel
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

	public function RegistrarHotel($data)
	{
		try 
		{
			$sql = "INSERT INTO hotel (nombre, imagen, direccion,tipo,facebook,instagram,telefono,descripcion,email) 
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