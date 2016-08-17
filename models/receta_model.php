<?php  
/**
* 
*/
class receta_model extends Model
{
	
	public function __construct(){
		parent::__construct();
	}

	function Load_receta($id){
		
		$receta = $id;

		$stm  = $this->db->prepare("SELECT recetario.* FROM `recetario` LEFT OUTER JOIN `recetas` on (recetario.id_receta = recetas.id) WHERE recetas.id = :id");		
		$stm->execute(array(			
			':id' => $receta
		));
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		

		$data = $stm->fetchAll();
		
		return $data;
		//echo json_encode($data);
	}

}
?>
