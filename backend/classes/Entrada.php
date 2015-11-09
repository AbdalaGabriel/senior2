<?php 

class Entrada
{

	public $idEntrada;
	public $idUsuario;
	public $titulo;
	public $fecha;
	public $contenido;
	public $autor;
	public $Listado;

	//Conector
	private $Con;
	
	public function Entrada()
	{
		$this->Con = new Conector("alquimia", "root", "", null); 
	}
	
	public function Agregar()
	{
		$sql = "INSERT INTO entradas (idEntrada, titulo, contenido, autor, fecha) 
		VALUES ('$this->idEntrada', '$this->titulo', '$this->contenido', '$this->autor','$this->fecha')";
		
		
	
		
		return $this->Con->EjecutarABM($sql); //obtengo un boolean
	}
	
	public function Modificar()
	{
		$sql = "UPDATE entradas SET  titulo = '$this->titulo', contenido = '$this->contenido'
		WHERE idEntrada = '$this->idEntrada'";
		
		return $this->Con->EjecutarABM($sql);
	}
	
	public function Eliminar()
	{
		$sql = "DELETE FROM entradas WHERE idEntrada = $this->idEntrada ";
		 return $this->Con->EjecutarABM($sql);
	}
	
	public function Listar($filtro = null)
	{
		$sql = "SELECT * FROM entradas ";
	
		if(isset($filtro))
		{
			$sql = $sql.' WHERE idEntrada = '.$filtro;
		}
		
		$orden = " order by idEntrada DESC";
		$sql = $sql.$orden;
		
		$this->Listado = $this->Con->Select($sql);
	}
	
	
	public function ListarPorProyecto($filtro = null)
	{
		$sql = "SELECT * FROM entradas ";
	
		if(isset($filtro))
		{
			$sql = $sql.' WHERE idEntradaidEntrada = '.$filtro;
		}
		
		$this->Listado = $this->Con->Select($sql);
	}
	
	
}
?>