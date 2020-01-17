<?php
class Clinica
{
	private $pdo;
    
	public $idclinica;
	public $nombre;
    public $imagen;
    public $direccion;
    public $facebook;
    public $instagram;
    public $telefono;
    public $descripcion;
    public $email;
    public $tipo;
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

	
	public function ListarClinicaActivos()
	{
		try
		{

			
			$stm = $this->pdo->prepare("SELECT * FROM clinica WHERE estado = 1");
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

	public function ListarClinicaInactivos()
	{
		try
		{

		
			$stm = $this->pdo->prepare("SELECT * FROM clinica WHERE estado = 0");
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

	public function ObtenerClinica($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM clinica WHERE idgim = ?");
			          

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
	

	public function CambiarEstadoClinica($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE clinica SET 
						estado      = ?
				    WHERE idclinica = ?";

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

	public function ActualizarClinica($data)
	{
		try 
		{
			$sql = "UPDATE clinica SET 
						 nombre        = ?, 
						direccion      = ?,
						      facebook = ?,
					  instagram        = ?,
                         telefono      = ?, 
						   email       = ?,
                         descripcion   = ?,
                                tipo   = ?
				        WHERE idclinica= ?";

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
                        $data->tipo,
                        $data->idclinica
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

	public function RegistrarClinica($data)
	{
			try 
		{
			$sql = "INSERT INTO clinica (nombre, imagen, direccion,facebook,instagram,telefono,descripcion,email,tipo) 
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
	
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
                        $data->email,
                        $data->tipo
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

