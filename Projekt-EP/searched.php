
<?PHP

	$connection	=	mysqli_connect("mysql.itn.liu.se", "lego" , "" , "lego");


		$search = strip_tags($_POST["search"]); //real_escape string för säkerhet
		echo $search;

	$query = mysqli_query($connection,	"SELECT * FROM inventory WHERE ItemID = '$search'"); //hämtar alla matchande ColorID (funkar inte)
		

		
	while($row = mysqli_fetch_array($query))
	{	
		$resultat = $row['ItemID'];
		echo $resultat;
		echo "<br>";
		
	}
	
	
	
?>



