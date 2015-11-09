<?php 

class Bloque
{

	public $idBloque;
	public $titulo;
	public $contenido;
	public $ordenBloque;
	public $idPagina;

	//Conector
	private $Con;
	
	public function Bloque()
	{
		$this->Con = new Conector("alquimia", "root", "", null); 
	}
	
	public function Agregar()
	{
		$sql = "INSERT INTO bloques (idBloque, titulo, contenido) 
		VALUES ('$this->idBloque', '$this->titulo', '$this->contenido')";
		
			
		return $this->Con->EjecutarABM($sql); //obtengo un boolean
	}

	public function AgregarRelacionPag(){

		$sql = "INSERT INTO bloquepertenecepagina (idBloque, idPagina, ordenBloque) 
		VALUES ('$this->idBloque', '$this->idPagina', '$this->ordenBloque')";
		
		

		return $this->Con->EjecutarABM($sql); //obtengo un boolean
	}
	
	public function Modificar()

	{
		$sql = "UPDATE bloques SET  titulo = '$this->titulo', contenido = '$this->contenido'
		WHERE idBloque = '$this->idBloque'";
		
		return $this->Con->EjecutarABM($sql);
	}
	
	public function Eliminar()
	{
		$sql = "DELETE FROM bloques WHERE idBloque = $this->idBloque";
		 return $this->Con->EjecutarABM($sql);
	}
	
	public function Listar($filtro = null)
	{
		$sql = "SELECT * FROM bloques";
	
		if(isset($filtro))
		{
			$sql = $sql.' WHERE contenido = '.$filtro;
		}
		
		$orden = " ORDER by titulo";

		$sql = $sql.$orden;
		
		
		$this->Listado = $this->Con->Select($sql);
	}

	public function ListarBloquesSegunPagina($filtro = null)
	{
		$sql = "SELECT bloques.titulo, bloques.contenido FROM bloquepertenecepagina, bloques WHERE bloques.idBloque = bloquepertenecepagina.idBloque";

	
		if(isset($filtro))
		{
			$sql = $sql.' and bloquepertenecepagina.idPagina ='.$filtro;
		}
		
		//$orden = " ORDER by titulo";

		//$sql = $sql.$orden;
		

		
		$this->Listado = $this->Con->Select($sql);
	}
	
	public function ListarBloquesPorTitulo($filtro = null)
	{
		$sql = "SELECT * FROM bloques";

	
		if(isset($filtro))
		{
			$sql = $sql.' WHERE titulo = '.$filtro;
		}
		
		$orden = " ORDER by titulo";

		$sql = $sql.$orden;
		
		
		$this->Listado = $this->Con->Select($sql);
	}
	
	
}
?>