<?php 
spl_autoload_register(function ($class_name) {
    include 'class/'.$class_name . '.php';
});
ob_start();
$type = isset($_POST["submit"]) ? $_POST["submit"] : $_GET["action"] ; 
	
	if ($type == "Register") {

		$user = new User();
		$res = $user->register($_POST);

		if($res){

		   header("location: index.php");
      	}else {
          	header("location: register.php");
		}

		

	}
	elseif ($type == "Login") {
		$user = new User();
		$uu = $user->login($_POST);
		if($user->login($_POST)){
           	header("location: index.php");
      	 }else {
          	header("location: login.php");
		  }
		
	}

	elseif ($type == 'logout') {
		$user = new User();
		$user->logout();
		header("location: login.php");
	}
	elseif ($type == 'Send') {
		$user = new User();
		$user->sendSms($_POST);
		header("location: index.php");
	}
	elseif ($type == 'getSms') {
		$user = new User();
		$sms = $user->getUserSms($_POST['id']);
        echo json_encode($sms);

	}
		



?>