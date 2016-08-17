<?php 

/**
* 
*/
class help extends Controller
{
	
	function __construct()
	{
		parent::__construct();	
	}

	function index(){		
		$this->view->msg = "Iniciar Sesión";
		$this->view->render('/header');		
		$this->view->render('/help/index');		
		$this->view->render('/footer_admin',1);		
	}
	
	
	public function run(){
		$this->model->run();		
	}
	
}

?>
