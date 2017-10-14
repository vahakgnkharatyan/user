<?php 
class Session {
	
 public function login($id,$type,$email){
 	 
 	session_start();
 	 $_SESSION['id'] = $id;
 	 $_SESSION['type'] =  $type ;      
     $_SESSION['login_user'] = $email;
 
 }
 public function loguot(){
		session_start();
		session_destroy();
		
	}
	public function getSessionData(){
		session_start();
		return $_SESSION;
	}

}


?>