<?php 

class Errors extends Controller {
	
	function __construct()
	{
		parent::__construct();		
	}

	function index(){
		$this->view->msg = "La página solicitada no existe, gracias por su comprensión";
		$this->view->render('/header',1);	
		$this->view->render('/error/index');
		$this->view->render('/footer_admin',1);			
	}
}
?>
