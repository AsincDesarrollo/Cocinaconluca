<?php 

header('Access-Control-Allow-Origin: http://cocinaconluca.comxa.com/admin');
header('Access-Control-Allow-Methods: POST, GET');

/**
 * 
 */
 class admin extends Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct(); Session::init();	 $logged =  Session::get('loggedIn');
 		 		
 		if ($logged == false) {
 			Session::destroy();
 			header('location: '.URL.'help');
 			exit;
 		}
 		
 		$this->view->css = array(
 			'admin/css/bootstrap.min.css',
 			'admin/css/sb-admin.css',
 			'admin/font-awesome/css/font-awesome.min.css',
 		);
 		

 		$this->view->js = array(
 				'admin/js/jquery.js',
 				'admin/js/bootstrap.min.js', 				
 				'admin/js/default.js'
 		);

 		
 	}

 	//renderizar vista
 	function index(){			
 		$this->view->msg = "Panel CMS";	
 		$this->view->msg_small = "kimen Systems"; 		
 		$this->view->render('/header_admin',1);	
		$this->view->render('/admin/index');
		$this->view->render('/footer_admin',1);				
	}

	//renderizar vista
 	function header(){			
 		$this->view->msg = "Sección Header";	
 		$this->view->msg_small = "Editar y Agregar nuevas Cabeceras";
 		$files = array();
		$images=preg_grep('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $files);


		if ($handle = opendir("public/img/portada")) {
		    while (false !== ($entry = readdir($handle))) {
		        $files[] = $entry;
		    }
		    $images = preg_grep('/\.(jpg|png)$/i', $files);
		    $listado = array();
		    //print_r($files);
		    foreach($images as $image)
		    {
		    	array_push($listado,$image);
		    }
			$this->view->imagenes = $listado;    
		    closedir($handle);
		}



 		$this->view->render('/header_admin',1);	
		$this->view->render('/admin/Seccion_cabecera');
		$this->view->render('/footer_admin',1);		

	}

	//renderizar vista
 	function auspicios(){			
 		$this->view->msg = "Sección Header";	
 		$this->view->msg_small = "Editar y Agregar nuevas Cabeceras";
 		
	 	$files = array();
				$images=preg_grep('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $files);


		if ($handle = opendir("public/img/portada")) {
		    while (false !== ($entry = readdir($handle))) {
		        $files[] = $entry;
		    }
		    $images = preg_grep('/\.(jpg|png)$/i', $files);
		    $listado = array();
		    //print_r($files);
		    foreach($images as $image)
		    {
		    	array_push($listado,$image);
		    }
			$this->view->imagenes = $listado;    
		    closedir($handle);
		}
		


 		$this->view->render('/header_admin',1);	
		$this->view->render('/admin/Seccion_auspicios');
		$this->view->render('/footer_admin',1);		

	}

	//renderizar vista
 	function recetas(){			
 		$this->view->msg = "Sección Header";	
 		$this->view->msg_small = "Editar y Agregar nuevas Cabeceras";
 		
	 	$files = array();
				$images=preg_grep('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $files);


		if ($handle = opendir("public/img/portada")) {
		    while (false !== ($entry = readdir($handle))) {
		        $files[] = $entry;
		    }
		    $images = preg_grep('/\.(jpg|png)$/i', $files);
		    $listado = array();
		    //print_r($files);
		    foreach($images as $image)
		    {
		    	array_push($listado,$image);
		    }
			$this->view->imagenes = $listado;    
		    closedir($handle);
		}
		


 		$this->view->render('/header_admin',1);	
		$this->view->render('/admin/Seccion_recetas');
		$this->view->render('/footer_admin',1);		

	}

	//renderizar vista
 	function recetario(){	

 		if ($handle = opendir("public/img/portada")) {
		    while (false !== ($entry = readdir($handle))) {
		        $files[] = $entry;
		    }
		    $recetas = $this->model->GetDinstictRecetas();
		    
		    //$datos = json_encode($images);
		    //echo "<br/>".$datos;

			$this->view->recetas = $recetas;    
		    closedir($handle);
		}		
 		$this->view->render('/header_admin',1);	
		$this->view->render('/admin/Seccion_recetario');
		$this->view->render('/footer_admin',1);		

	}

	function logout(){
		Session::destroy();
		header('location: '.URL.'help');
 		exit;
	}

	function xhrInsert(){
		$this->model->xhrInsert();
	}

	function xhrGetListings(){
		$this->model->xhrGetListings();
	}

	function xhrDeleteList(){
		$this->model->xhrDeleteList();
	}

	

	function xhrInsert_auspicios(){
		$this->model->xhrInsert_auspicios();
	}

	function xhrGetListings_auspicios(){
		$this->model->xhrGetListings_auspicios();
	}

	function xhrDeleteList_auspicios(){
		$this->model->xhrDeleteList_auspicios();
	}

	#recetasss
	function xhrInsert_recetas(){
		$this->model->xhrInsert_recetas();
	}

	function xhrGetListings_recetas(){
		$this->model->xhrGetListings_recetas();
	}

	function xhrDeleteList_recetas(){
		$this->model->xhrDeleteList_recetas();
	}

	#recetarios
	function xhrInsert_recetario(){
		$this->model->xhrInsert_recetario();
	}

	function xhrGetListings_recetario(){
		$this->model->xhrGetListings_recetario();
	}

	function xhrDeleteList_recetario(){
		$this->model->xhrDeleteList_recetario();
	}
	
 } ?>
