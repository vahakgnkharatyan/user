<?php

  $user = new User();
  $users = $user -> getUsers(); 

   $whoSendSms = $user -> getWhoSendSms($_SESSION['id']);
  // 	var_dump($howSendSms);
 ?>
<div class="form">
<h1>Sms</h1>
<select id="smsSender" name="smsSender">
<?php
	echo "<option value='0'>You have ".count($whoSendSms)." sms</option>";
	foreach ($whoSendSms as $key => $value) {
		echo "<option value=\"". $value['id']."\">".$value['first_name']." ".$value['last_name']."(".$value['email'].")</option>";
		
	}
  
  ?>
</select>
<div id="sms"></div>
<form name="sms" action="controller.php" method="post">
<select name="user">
<?php
	foreach ($users as $key => $value) {
		echo "<option value=\"". $value['id']."\">".$value['email']."</option>";
		
	}
  
  ?>
</select>
<textarea name="sms" rows="4" cols="50" required></textarea>
<input type="submit" name="submit" value="Send" />
</form>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/defoult.js"></script>
