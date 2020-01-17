<?php
class Gimnasio
{
	private $pdo;
    
	public $idgim;
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

	
	public function ListarGimnasioActivos()
	{
		try
		{

			
			$stm = $this->pdo->prepare("SELECT * FROM gimnacio WHERE estado = 1");
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

	public function ListarGimnasioInactivos()
	{
		try
		{

		
			$stm = $this->pdo->prepare("SELECT * FROM gimnacio WHERE estado = 0");
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

	public function ObtenerGimnasio($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM gimnacio WHERE idgim = ?");
			          

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
	

	public function CambiarEstadoGimnasio($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE gimnacio SET 
						estado      = ?
				    WHERE idgim = ?";

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

	public function ActualizarGimnasio($data)
	{
		try 
		{
			$sql = "UPDATE gimnacio SET 
						 nombre        = ?, 
						direccion      = ?,
						      facebook = ?,
					  instagram        = ?,
                         telefono      = ?, 
						   email       = ?,
                         descripcion   = ?
				        WHERE idgim= ?";

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
                        $data->idgim
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

	public function RegistrarGimnasio($data)
	{
			try 
		{
			$sql = "INSERT INTO gimnacio (nombre, imagen, direccion,facebook,instagram,telefono,descripcion,email) 
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

