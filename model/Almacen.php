<?php
class Almacen
{
	private $pdo;
    

    public $idalmacen;
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

	public function ListarAlmacenActivos()
	{
		try
		{

		
			$stm = $this->pdo->prepare("SELECT * FROM almacen WHERE estado = 1");
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

	// public function ListarPeliculasHorario()
	// {
	// 	try
	// 	{

	// 		$stm = $this->pdo->prepare("SELECT DISTINCT p.idpelicula as idpelicula, p.nombre as nombrepelicula, p.imagen as imagen FROM horario as h INNER JOIN pelicula as p ON h.idpelicula = p.idpelicula WHERE h.estado = 1 ORDER BY fechapelicula DESC");
	// 		$stm->execute();

	// 		return $stm->fetchAll(PDO::FETCH_OBJ);
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

	// public function ListarHorarioPorPelicula($idpelicula)
	// {
	// 	try 
	// 	{
	// 		$stm = $this->pdo
	// 		          ->prepare("SELECT h.idhorario as idhorario, Date_format(h.fechapelicula,'%d-%m-%Y') as fechapelicula, h.horapelicula as horapelicula, s.nombre as sala FROM horario as h INNER JOIN sala AS s ON h.idsala = s.idsala INNER JOIN pelicula as p ON h.idpelicula = p.idpelicula WHERE h.idpelicula = ? ORDER BY fechapelicula");
			          
	// 		$stm->execute(array($idpelicula));
	// 		return $stm->fetchAll(PDO::FETCH_OBJ);
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

	public function ListarAlmacenInactivos()
	{
		try
		{

			
			$stm = $this->pdo->prepare("SELECT * FROM almacen WHERE estado = 0");
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

	public function ObtenerAlmacen($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM almacen WHERE idalmacen = ?");
			          

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
	
	public function CambiarEstadoAlmacen($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE almacen SET 
						estado    = ?
				    WHERE idalmacen = ?";

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

	public function ActualizarAlmacen($data)
	{
		try 
		{
			$sql = "UPDATE almacen SET 
						 nombre        = ?, 
						direccion      = ?,
                         tipo          = ?, 
						      facebook = ?,
					  instagram        = ?,
                         telefono      = ?, 
						   email       = ?,
                         descripcion   = ?
				    WHERE idalmacen = ?";

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
                        $data->idalmacen
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

	public function RegistrarAlmacen($data)
	{
		try 
		{
			$sql = "INSERT INTO almacen (nombre, imagen, direccion,tipo,facebook,instagram,telefono,descripcion,email) 
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