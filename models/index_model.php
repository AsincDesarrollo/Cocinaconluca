<?php 

/**
* 
*/
class index_model extends Model
{
	
	public function __construct(){
		parent::__construct();
	}

	function Load_headerSection(){
		$stm  = $this->db->prepare('SELECT * FROM header_section');
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		$stm->execute(array(			
		));

		$data = $stm->fetchAll();
		
		return $data;
		//echo json_encode($data);
	}

	function Load_auspiciosSection(){
		$stm  = $this->db->prepare('SELECT * FROM auspiciadores');
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		$stm->execute(array(			
		));

		$data = $stm->fetchAll();
		
		return $data;
		//echo json_encode($data);
	}

	function Load_recetasSection(){
		$stm  = $this->db->prepare('SELECT * FROM recetas');
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		$stm->execute(array(			
		));

		$data = $stm->fetchAll();
		
		return $data;
		//echo json_encode($data);
	}

}

?>
