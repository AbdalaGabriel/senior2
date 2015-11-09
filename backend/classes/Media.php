<?php 

class Media
{

	public $idMedia;
	public $nombre;
	public $fecha;
	public $url;

	public $Listado;

	//Conector
	private $Con;
	
	public function Media()
	{
		$this->Con = new Conector("alquimia", "root", "", null); 
	}
	
	public function Agregar()
	{
		$sql = "INSERT INTO media (idMedia, nombre, url, fecha) 
		VALUES ('$this->idMedia', '$this->nombre', '$this->url', '$this->fecha')";
		
		
	
		
		return $this->Con->EjecutarABM($sql); //obtengo un boolean
	}
	
	public function Modificar()
	{
		$sql = "UPDATE media SET  nombre = '$this->nombre', url = '$this->url'
		WHERE idMedia = '$this->idMedia'";
		
		return $this->Con->EjecutarABM($sql);
	}
	
	public function Eliminar()
	{
		$sql = "DELETE FROM media WHERE idMedia = $this->idMedia ";
		 return $this->Con->EjecutarABM($sql);
	}
	
	public function Listar($filtro = null)
	{
		$sql = "SELECT * FROM media ";
	
		if(isset($filtro))
		{
			$sql = $sql.' WHERE idUsuario = '.$filtro;
		}
		
		$orden = " order by idMedia DESC";
		$sql = $sql.$orden;
		
		$this->Listado = $this->Con->Select($sql);
	}
	

	
	
}
?>