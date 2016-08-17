<?php 


/**
* 
*/
class admin_model extends Model
{
	
	public function __construct(){
		parent::__construct();		
	}
			
	#Portada
	function xhrInsert(){

		$titulo   = $_POST['titulo'];
		$imagen   = $_POST['imagen'];
		$parrafo  = $_POST['parrafo'];
		$boton    = $_POST['boton'];
		$urlBoton = $_POST['url'];

		//echo $titulo." :".$imagen." :".$parrafo." :".$boton." :".$urlBoton;
		
		$stm  = $this->db->prepare('INSERT INTO header_section (titulo,imagen,parrafo,boton,urlBoton) VALUES  (:titulo,:imagen,:parrafo,:boton,:urlBoton)');

		$stm->execute(array(
			':titulo'   => $titulo,
			':imagen'   => $imagen,
			':parrafo'  => $parrafo,
			':boton'    => $boton,
			':urlBoton' => $urlBoton
		));

		$arr = $stm->errorInfo();
		
		if ($arr[0] == "00000") {
			$data = array('id' => $this->db->lastInsertId(),
						'titulo' => $titulo,
						'imagen' => $imagen,
						'parrafo' => $parrafo,
						'boton' => $boton,
						'urlBoton' => $urlBoton);
			echo json_encode($data);
		}else{
			echo $arr[1];
			echo $arr[2];
		}
	}

	function xhrGetListings(){
		$stm  = $this->db->prepare('SELECT * FROM header_section');
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		$stm->execute(array(			
		));

		$data = $stm->fetchAll();
		echo json_encode($data);
	}
	
	function xhrDeleteList(){

		$id = $_POST['id'];

		$stm  = $this->db->prepare('DELETE FROM header_section WHERE id = :id');
		$stm->execute(array(	
			':id' => $id
		));

		$arr = $stm->errorInfo();
		
		if ($arr[0] == "00000") {
			echo "Borrado Correctamente";
		}else{
			echo $arr[1];
			echo $arr[2];
		}		
	}
	#Termino Portada

	#auspiciadores
	function xhrInsert_auspicios(){

		
		$imagen       = $_POST['imagen'];
		$descripcion  = $_POST['descripcion'];

		//echo $titulo." :".$imagen." :".$parrafo." :".$boton." :".$urlBoton;
		
		$stm  = $this->db->prepare('INSERT INTO auspiciadores (imagen,descripcion) VALUES  (:imagen,:descripcion)');

		$stm->execute(array(
			':imagen'   => $imagen,
			':descripcion'   => $descripcion
		));

		$arr = $stm->errorInfo();
		
		if ($arr[0] == "00000") {
			$data = array('id' => $this->db->lastInsertId(),						
						'imagen' => $imagen,
						'descripcion' => $descripcion
						);
			echo json_encode($data);
		}else{
			echo $arr[1];
			echo $arr[2];
		}
	}

	function xhrGetListings_auspicios(){
		$stm  = $this->db->prepare('SELECT * FROM auspiciadores');
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		$stm->execute(array(			
		));

		$data = $stm->fetchAll();
		echo json_encode($data);
	}

	function xhrDeleteList_auspicios(){

		$id = $_POST['id'];

		$stm  = $this->db->prepare('DELETE FROM auspiciadores WHERE id = :id');
		$stm->execute(array(	
			':id' => $id
		));

		$arr = $stm->errorInfo();
		
		if ($arr[0] == "00000") {
			echo "Borrado Correctamente";
		}else{
			echo $arr[1];
			echo $arr[2];
		}		
	}

	#Recetasss
	function xhrInsert_recetas(){
		
		$nombre       = $_POST['nombre'];
		$categoria  = $_POST['categoria'];
		$imagen  = $_POST['imagen'];

		//echo $titulo." :".$imagen." :".$parrafo." :".$boton." :".$urlBoton;
		
		$stm  = $this->db->prepare('INSERT INTO recetas (nombre,categoria,imagen) VALUES  (:nombre,:categoria,:imagen)');

		$stm->execute(array(
			':nombre'   => $nombre,
			':categoria'   => $categoria,
			':imagen'   => $imagen
		));

		$arr = $stm->errorInfo();
		
		if ($arr[0] == "00000") {
			$data = array('id' => $this->db->lastInsertId(),						
						'nombre' => $nombre,
						'categoria' => $categoria,
						'imagen' => $imagen
						);
			echo json_encode($data);
		}else{
			echo $arr[1];
			echo $arr[2];
		}
	}

	function xhrGetListings_recetas(){
		$stm  = $this->db->prepare('SELECT * FROM recetas');
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		$stm->execute(array(			
		));

		$data = $stm->fetchAll();
		echo json_encode($data);
	}

	function xhrDeleteList_recetas(){

		$id = $_POST['id'];

		$stm  = $this->db->prepare('DELETE FROM recetas WHERE id = :id');
		$stm->execute(array(	
			':id' => $id
		));

		$arr = $stm->errorInfo();
		
		if ($arr[0] == "00000") {
			echo "Borrado Correctamente";
		}else{
			echo $arr[1];
			echo $arr[2];
		}		
	}

	function  GetDinstictRecetas(){

		$stm  = $this->db->prepare('select DISTINCT id,nombre from recetas');
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		$stm->execute(array(			
		));

		$data = $stm->fetchAll();		
		return $data;
		//echo json_encode($data);
	}
	
	#Recetario
	function xhrInsert_recetario(){
		
		$id_receta    = $_POST['receta'];
		$nombrePaso   = $_POST['nombre'];
		$descripcion  = $_POST['descripcion'];
		$duracion     = $_POST['duracion'];

		//echo $titulo." :".$imagen." :".$parrafo." :".$boton." :".$urlBoton;
		
		$stm  = $this->db->prepare('INSERT INTO recetario (id_receta,nombrePaso,descripcion,duracion) VALUES  (:id_receta,:nombrePaso,:descripcion,:duracion)');

		$stm->execute(array(
			':id_receta'     => $id_receta,
			':nombrePaso'    => $nombrePaso,
			':descripcion'   => $descripcion,
			':duracion'      => $duracion
		));

		$arr = $stm->errorInfo();
		
		if ($arr[0] == "00000") {
			$data = array('id' => $this->db->lastInsertId(),						
						'idReceta'     => $id_receta,
						'nombre'    => $nombrePaso,
						'descripcion'   => $descripcion,
						'duracion'      => $duracion
						);
			echo json_encode($data);
		}else{
			echo $arr[1];
			echo $arr[2];
		}
	}

	function xhrGetListings_recetario(){
		$stm  = $this->db->prepare('SELECT * FROM recetario');
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		$stm->execute(array(			
		));

		$data = $stm->fetchAll();
		echo json_encode($data);
	}

	function xhrDeleteList_recetario(){

		$id = $_POST['id'];

		$stm  = $this->db->prepare('DELETE FROM recetario WHERE id = :id');
		$stm->execute(array(	
			':id' => $id
		));

		$arr = $stm->errorInfo();
		
		if ($arr[0] == "00000") {
			echo "Borrado Correctamente";
		}else{
			echo $arr[1];
			echo $arr[2];
		}		
	}
}

?>
