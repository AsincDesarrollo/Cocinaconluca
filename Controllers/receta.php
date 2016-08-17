<?php 


class receta extends Controller {
	
	function __construct()
	{
		parent::__construct();	
				
	}

	function index(){	
	}

	function plato($id){					

		$dataJson = $this->model->Load_receta($id);	
		$htmlString = "";
		
		for ($i=0; $i < count($dataJson); $i++) { 			

			foreach ($dataJson[$i] as $key => $value) {

				if ($i%2) {
					$htmlString = $htmlString.'
						<div class="col-md-12">
							'.$key.' :'.$value.'
						</div>
					';
				}else{
					$htmlString = $htmlString.'
						<div class="bg-primary col-md-12">
							'.$key.' :'.$value.'							
						</div>
					';
				}
			}

		}

		$this->view->pasos = $htmlString;

		$this->view->render('/header',1);	
		$this->view->render('/receta/index');
		$this->view->render('/footer_admin',1);	
	}
}
?>
