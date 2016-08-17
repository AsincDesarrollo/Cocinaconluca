<?php 

/**
 * 
 */
 class View
 { 	
 	function __construct()
 	{
 		//echo "this is the view <br/>";
 	}

 	public function render($name, $noInclude = false){

 		if ($noInclude == true) {
 			require 'Views'.$name.'.php';
 		}else{			
			require 'Views'.$name.'.php';			
 		}

 				
 	}

 } ?>
