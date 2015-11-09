<?php 

class ItemsPortfolio
{

	public $idItem;
	public $idUsuario;
	public $fotoPortada;
	public $fecha;
	public $descripcion;
	public $titulo;
	public $Listado;
	public $Listado2;


	public $urlImagen;
	public $alt;
	public $idImagen;

	//Conector
	private $Con;
	
	public function ItemsPortfolio()
	{
		$this->Con = new Conector("alquimia", "root", "", null); 
	}
	
	public function Agregar()
	{
		$sql = "INSERT INTO itemsportfolio (idItem, titulo, imagenPortada, fecha, descripcion) 
		VALUES ('$this->idItem', '$this->titulo', '$this->fotoPortada', '$this->fecha', '$this->descripcion')";
		
		
	
		
		return $this->Con->EjecutarABM($sql); //obtengo un boolean
	}
	

	
	public function imagenperteneceitemportfolio()
	{
		$sql = "INSERT INTO imagenesportfolio (idImagen, urlImagen, alt) 
		VALUES ('$this->idImagen', '$this->urlImagen', '$this->alt')";
		
		$this->Con->EjecutarABM($sql);

	
	
		
		$sql2 = "SELECT * FROM imagenesportfolio ORDER BY idImagen DESC";
		
		$this->Listado = $this->Con->Select($sql2);
		$filaImg = $this->Listado[0];
		$idImg = $filaImg["idImagen"];


	

		$sql3 = "SELECT * FROM itemsportfolio ORDER BY idItem DESC";
		
		$this->Listado2 = $this->Con->Select($sql3);
		$filaItemPortfolio = $this->Listado2[0];
		$idItemPortfolio = $filaItemPortfolio["idItem"];


		$sql4 = "INSERT INTO imagenperteneceitemportfolio (idImagen, idItemPortfolio) 
		VALUES ('$idImg', '$idItemPortfolio')";
	
		

		  //obtengo un boolean
		return $this->Con->EjecutarABM($sql4);
	}


	public function ListarItemImages($id = null){
		$sql = "SELECT imagenesportfolio.urlImagen FROM imagenesportfolio INNER JOIN imagenperteneceitemportfolio ON imagenesportfolio.idImagen=imagenperteneceitemportfolio.idImagen ";

		if(isset($id)){

			$sql = $sql." and imagenperteneceitemportfolio.idItemPortfolio = ".$id;
		}

		$this->Listado = $this->Con->Select($sql);
	}

	public function Modificar()
	{
		$sql = "UPDATE itemsportfolio SET  fotoPortada = '$this->fotoPortada', descripcion = '$this->descripcion', titulo= '$this->titulo'
		WHERE idProyecto = '$this->idProyecto'";
		
		return $this->Con->EjecutarABM($sql);
	}
	
	public function Eliminar()
	{
		$sql = "DELETE FROM itemsportfolio WHERE idItem = $this->idItem";
		 return $this->Con->EjecutarABM($sql);
	}

	public function EliminarItem()
	
	{
		

		$sql0 = "SELECT `idImagen` FROM `imagenperteneceitemportfolio` WHERE idItemPortfolio = $this->idItem";
		//echo $sql0;
		$this->Listado = $this->Con->Select($sql0);
		//echo "<br/>";

		$sql = "DELETE FROM imagenperteneceitemportfolio WHERE idItemPortfolio = $this->idItem";
		$this->Con->EjecutarABM($sql);
		//echo $sql;
		//echo "<br/>";

		
		$max = count($this->Listado);

		for ($i = 0; $i < $max; $i++) {
	 		
	 		$fila = $this->Listado[$i];

	 		$idImagen = $fila["idImagen"];

	 		$sql1 = "DELETE FROM `imagenesportfolio` WHERE	idImagen =$idImagen"; 

	 		//echo $sql1;
	 		//echo "<br/>";

	 		$this->Con->EjecutarABM($sql1);



	 	}

	

		$sql2 = "DELETE FROM itemsportfolio WHERE idItem = $this->idItem";
		//echo $sql2;
		//echo "<br/>";
		return $this->Con->EjecutarABM($sql2);



	}
	


	
	public function Listar($filtro = null)
	{
		$sql = "SELECT * FROM itemsportfolio ";
	
		if(isset($filtro))
		{
			$sql = $sql.' WHERE idItem = '.$filtro;
		}
		
		$orden = " order by idItem DESC";
		$sql = $sql.$orden;
		
		$this->Listado = $this->Con->Select($sql);
	}
	
	
	public function ListarPorProyecto($filtro = null)
	{
		$sql = "SELECT * FROM itemsportfolio ";
	
		if(isset($filtro))
		{
			$sql = $sql.' WHERE idProyecto = '.$filtro;
		}
		
		$this->Listado = $this->Con->Select($sql);
	}
	
	
}
?>