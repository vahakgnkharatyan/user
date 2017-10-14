 <?php 
class User{

	public function register($data){
		$db = new Db();
		$type = $data['type'];
        $query = sprintf("INSERT INTO `users` VALUES (null,'%s','%s','%s','%s', $type)", 
        	$db->quote($data["firstName"]),$db->quote($data["lastName"]),
        	$db->quote($data["email"]),md5($db->quote($data["password"])));
       
		$res = $db->query($query);
		
		if($res === true){
			$session = new Session();
			$session->login($data["type"],$data["email"]);
			return true;
	    }
	   return false; 
		
	}
	public  function login($data){
		
		// require_once 'db.php' ;
		$db = new Db();
		$query = sprintf("SELECT id,type FROM `users` WHERE email = '%s' and password = '%s'",
			$data['email'],md5($data['password']));
		
		$res = $db->select($query);
        $count = $db->getCount($query);
        

      if($count == 1) {
      	$session = new Session();
 		$session->login($res[0]['id'],$res[0]['type'],$data['email']);
          
        return true;
      }
  return false;
	}
	public function logout(){
		$session = new Session();
		$session->loguot();
	}
	public function getUsers(){
		$db = new Db();
		$query = sprintf("SELECT id,email FROM `users` ");
		$res = $db->select($query);
		return $res;
	}
	public function sendSms($data){
		$db = new Db();
		$session = new Session();
		$sessioData = $session->getSessionData();
		$query = sprintf("INSERT INTO `message` VALUES (null, '%d', '%s', '%d')", 
			$sessioData['id'], $db->quote($data["sms"]), $data['user']);
		$res = $db->query($query);
		if($res === true){
			return true;
	    }
	   return false; 
	}
	public function getWhoSendSms($id){
		$db = new Db();
		$query = sprintf("SELECT users.* FROM `message` left join users on users.id = message.from_whom WHERE user_id = '%d' ",$id);
		$res = $db->select($query);
		return $res;
	}
	public function getUserSms($id){
		$db = new Db();
		$session = new Session();
		$sessioData = $session->getSessionData();
		$query = sprintf("SELECT sms FROM `message`  WHERE user_id = '%d' and from_whom = '%d' ",$sessioData['id'],$id);
		$res = $db->select($query);
		return $res;
	}
}

 ?>