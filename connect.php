<!doctype html>

<html>

<head>
<link rel='shortcut icon' type='image/x-icon' href='icon.jpg' />
<link rel="stylesheet" type="text/css" href="style.css">
<title>Legosökning</title>
</head>

<?PHP
$connection	=	mysqli_connect("mysql.itn.liu.se", "lego" , "" , "lego"); //kopplar upp mot databasen lego
	
	if ($connection->connect_error)
	{
		die("Connection failed: " . $connection->connect_error);
	} 

	?>
	
	</body>



</html>