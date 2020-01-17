<?php
class Carwash
{
	private $pdo;
    
	public $idcar;
    public $nombre;
    public $imagen;
    public $direccion; 
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

	public function ListarCarwashActivas()
	{
		try
		{                        

			$stm = $this->pdo->prepare("SELECT * FROM carwash WHERE estado = 1");
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

	public function ListarCarwashInactivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM carwash WHERE estado = 0");
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

	public function ObtenerCarwash($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM carwash WHERE idcar = ?");
			          

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
	

	public function CambiarEstadoCarwash($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE carwash SET 
						estado      = ?
				    WHERE idcar  = ?";

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

	public function ActualizarCarwash($data)
	{
		try 
		{
			$sql = "UPDATE carwash SET 
						 nombre        = ?, 
						direccion      = ?,
						      facebook = ?,
					  instagram        = ?,
                         telefono      = ?, 
						   email       = ?,
                         descripcion   = ?
				    WHERE idcar = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->direccion,
                        $data->facebook,
                        $data->instagram,
                        $data->telefono,
                        $data->email,
                        $data->descripcion,
                        $data->idcar
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

	public function RegistrarCarwash($data)
	{
		try 
		{
			$sql = "INSERT INTO carwash (nombre, imagen, direccion,facebook,instagram,telefono,descripcion,email) 
					VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
	
			$this->pdo->prepare($sql)
				 ->execute(
					array(             
						$data->nombre,
						$data->imagen,  
						$data->direccion,
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