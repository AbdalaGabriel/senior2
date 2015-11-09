<?php 

class Pagina
{

	public $idPagina;
	public $titulo;
	public $urlFriendly;


	//Conector
	private $Con;
	
	public function Pagina()
	{
		$this->Con = new Conector("alquimia", "root", "", null); 
	}
	
	public function Agregar()
	{
		$sql = "INSERT INTO paginas (idPagina, titulo, urlFriendly) 
		VALUES ('$this->idPagina', '$this->titulo', '$this->urlFriendly')";
		
		
	
		
		return $this->Con->EjecutarABM($sql); //obtengo un boolean
	}
	
	public function Modificar()

	{
		$sql = "UPDATE paginas SET  titulo = '$this->titulo', urlFriendly = '$this->urlFriendly'
		WHERE idPagina = '$this->idPagina'";
		
		return $this->Con->EjecutarABM($sql);
	}
	
	public function Eliminar()
	{
		$sql = "DELETE FROM paginas WHERE idPagina = $this->idPagina";
		 return $this->Con->EjecutarABM($sql);
	}
	
	public function Listar($filtro = null)
	{
		$sql = "SELECT * FROM paginas";
	
		if(isset($filtro))
		{
			$sql = $sql.' WHERE urlFriendly = '.$filtro;
		}
		
		$orden = " ORDER by titulo";

		$sql = $sql.$orden;
		
		
		$this->Listado = $this->Con->Select($sql);
	}

	public function ListarPorTitulo($filtro = null)
	{
		$sql = "SELECT * FROM paginas";
	
		if(isset($filtro))
		{
			$sql = $sql.' WHERE titulo = '.$filtro;
		}
		
		
				
		$this->Listado = $this->Con->Select($sql);
	}
	
	
	
}
?>