<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="controller.php" method="post">
<input type="text" name="firstName" placeholder="firstName" required />
<input type="text" name="lastName" placeholder="lastName" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<div>
<input type="radio" name="type" value="0"> User<br>
<input type="radio" name="type" value="1"> Theacher<br>
</div>
<input type="submit" name="submit" value="Register" />
</form>
</div>
</body>
</html>