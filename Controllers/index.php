<?php 

header('Access-Control-Allow-Origin: http://cocinaconluca.comxa.com');
header('Access-Control-Allow-Methods: POST, GET');
/*
header('Access-Control-Allow-Headers: X-PINGARUNER');
header('Access-Control-Max-Age: 1728000');
header("Content-Length: 0");
header("Cache-Control: no-cache");
header("Content-Type: text/html");
*/

Class Index extends Controller{

	function __construct() {
		//echo "Index Controller";
		parent::__construct();
		$this->js = URL."public/lib/slick/slick.min.js";		
		$this->js = URL."public/js/customs.js";		
		   
	}

	function index(){		
		$this->view->msg = "Esta Página es mi Index";
		$this->view->render('/header');
		$this->view->render('/index/index');					
		$this->view->render('/index/header_section',1);					
		$this->view->render('/index/auspiciadores',1);					
		$this->view->render('/index/recetario',1);
		$this->view->render('/index/quienes_somos',1);
		$this->view->render('/footer',1);							
	}

	public function Load_headerSection(){
		$dataJson = $this->model->Load_headerSection();

		foreach ($dataJson as $key => $value) {

			if (empty($value["boton"])) {
				echo '<div class="header-content-inner">
		            <h1 id="homeHeading">'.$value["titulo"].'</h1>
		            <hr>
		            <p>'.$value["parrafo"].'</p>
		        </div>';	
			}elseif (empty($value["imagen"])) {
				echo '<div class="header-content-inner">
		            <h1 id="homeHeading">'.$value["titulo"].'</h1>
		            <hr>
		            <p>'.$value["parrafo"].'</p>
		            <a href="'.$value["urlBoton"].'" class="page-scroll btn btn-default btn-xl sr-button">'.$value["boton"].'</a>
		        </div>';
			}else{
				echo '<div class="header-content-inner">
		            <h3 id="homeHeading">'.$value["titulo"].'</h3>
		            <hr class="light">
		            <div class="row">
		            	<div class="col-md-12">
		            		<div class="col-md-6 text-center">
		            			<img src="'.URL_PORTADA.$value["imagen"].'" class="img img-thumbnail" style="max-height:320px;"/>
		            		</div>
		            		<div class="col-md-6">
		            			<h3>'.$value["parrafo"].'</h3>
		            			<a href="'.$value["urlBoton"].'" class="page-scroll btn btn-default btn-xl sr-button">'.$value["boton"].'</a>
		            		</div>
		            	</div>
		            </div>		            		            
		        </div>';
			}
			
		}
		//echo json_encode($dataJson);
	}

	public function Load_auspiciosSection(){
		$dataJson = $this->model->Load_auspiciosSection();

		foreach ($dataJson as $key => $value) {

				echo '<div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">                        
                        <img src="'.URL_PORTADA.$value["imagen"].'" width="150" />
                        <p class="text-muted">'.$value["descripcion"].'</p>
                    </div>
                </div>';
			
		}
	}

	public function Load_recetasSection(){
		$dataJson = $this->model->Load_recetasSection();

		foreach ($dataJson as $key => $value) {

                echo '
                <div class="col-lg-4 col-sm-6" >
                    <div  class="portfolio-box">
                        <img src="'.URL_PORTADA.$value["imagen"].'" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    '.$value["categoria"].'
                                </div>
                                <div class="project-name">
                                    '.$value["nombre"].'
                                </div>
                                <div class="text-center">
                                    <a Target="_blank" class="btn btn-default btn-xs" href="receta/plato/'.$value["id"].'">Ver Receta <i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
			
		}
	}
}

 ?>
