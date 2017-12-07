
<?PHP
$connection	=	mysqli_connect("mysql.itn.liu.se", "lego" , "" , "lego"); //kopplar upp mot databasen lego
	
	if ($connection->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully to datatase: Lego";
	?>