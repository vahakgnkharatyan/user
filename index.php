<?php
//include auth.php file on all secure pages
include("auth.php");

spl_autoload_register(function ($class_name) {
    include 'class/'.$class_name . '.php';
});
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>

<div class="form">
<h1><?php echo ($_SESSION["type"] == 1)? "Teacher" : "User";?></h1>
<?php
 if($_SESSION["type"] == 1){
 

 }
	require_once "sms.php";
 ?>
<a href="controller.php?action=logout">Logout</a>
</div>
</body>
</html>
