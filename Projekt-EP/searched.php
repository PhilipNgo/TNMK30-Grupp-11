<?PHP


	include('connect.php');

	echo "<form method = 'post' action='searched.php'>
	<input type='text' name='search'>
	<input type='submit' value='Sök på annan legosats'>
	</form>";

	$search = strip_tags($_POST["search"]); //lägg till real_escape string för säkerhet senare

	$Setname_search = mysqli_query($connection,	"SELECT * FROM sets WHERE Setname = '$search'"); //Lägg till kod som hanterar duplikantor av samma namn och ger någon varningsruta

	
	$convert_nametoID = mysqli_query($connection, "SELECT SetID, Year FROM sets WHERE Setname = '$search'");
	 
	 
	 
	while($row = mysqli_fetch_array($Setname_search)) //Sökning på sats. OBS!: kan ge mer än ett resultat
	{	
		$result_sats_name = $row['Setname'];
		$result_sats_Year = $row['Year'];
		
	

	while($row3 = mysqli_fetch_array($convert_nametoID)) //Konversion till ID från Setname
		{	
		$result_setID = $row3['SetID'];
		
			echo "<table><tr>";
			echo "<th>Sats</th>";
			echo "<th>Utgiven</th>";
			echo "<th>SetID</th></tr>";
			
			echo "<tr><td>". $result_sats_name."</td>";
			echo "<td>".$result_sats_Year. "</td>";
			echo "<td>".$result_setID."</td>";
			echo "<br></tr></table>";
			
			$get_parts = mysqli_query($connection, "SELECT * FROM inventory
			WHERE SetID = '$result_setID'");
		
		while($row2 = mysqli_fetch_array($get_parts)) //Bitarna som är kopplade till setID
		{	
			$result_partsID = $row2['ItemID'];
			$results_partsColor = $row2['ColorID'];
			$results_partsQuantity = $row2['Quantity'];
			echo "PartID:".$result_partsID;
			echo "Color:".$results_partsColor;
			echo "Quanitity:".$results_partsQuantity;
			echo "<br>";	
		}
		}
	}
	
	echo "<img src='avocado-chan.jpg' alt = 'avobabe'>";

	
?>



