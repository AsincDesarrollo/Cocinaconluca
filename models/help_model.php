<?php 

/**
* 
*/
class help_model extends Model
{
	
	public function __construct()
	{
		parent::__construct();			
	}

	public function run()
	{	
		echo $_POST['login'];echo "<br/>";				
		echo $_POST['password'];echo "<br/>";

		$sth = $this->db->prepare("select id from users where login = :login and password = :password;");

		$sth->execute(array(
			':login' => $_POST['login'],
			':password' => $_POST['password']
		));

		
		//$data = $sth->fetchAll();		
		$count = $sth->rowCount();

		if ($count > 0) {
			// login	
			session::init();
			session::set('loggedIn',true);							
			header('location: '.URL.'admin');
		}else{			
			header('location: '.URL.'help');
		}
	}
}


?>
