<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<title>Login</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<form action="controller/validation.php" method="POST">
		<h3>Login</h3>
		<input type="text" name="user" pattern="[a-z.]{1,20}" required placeholder="&#128113; User">
		<input type="password" name="pass" pattern="[a-z0-9]{1,6}" required placeholder="&#128272; Password">
		<input type="submit" value="Enter">
	</form>
</body>
</html>