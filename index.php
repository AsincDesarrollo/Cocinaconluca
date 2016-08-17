<?php


//use autoloader
require "libs/Bootstrap.php";
require "libs/Controller.php";
require "libs/Model.php";
require "libs/view.php";

//
require "config/paths.php";
require "config/database.php";

//Library
require "libs/Database.php";
require "libs/session.php";



$app = new Bootstrap();

/*switch(){
	    case 'index':
	        include('libs/index.php');
	        break;
	    default:
	        include('libs/404.php');
	        break;
	}	*/

?>