<!DOCTYPE html>
<html>
	<div id="block">
	<head>
		<meta charset="utf-8" />
		<title>EP Projekt</title>
		<link href="lego_style.css" rel="stylesheet">
	</head>

	<body>
		<div id="header">
		<h1>Personlig Samling</h1>
			<ul>
				<li><a class="knapp" href="startsida.php">Välkommen</a></li>
				<li><a class="knapp" href="lank.php">Länk</a></li>
			</ul>
		</div>
		<div class="tabell">
		<?PHP


	include('connect.php');

	echo "<form method = 'post' action='search_satser.php'>
	<input type='text' name='search'>
	<input type='submit' value='Sök på annan legosats'>
	</form>";
	$search = strip_tags($_POST["search"]); //lägg till real_escape string för säkerhet senare

	$Setname_search = mysqli_query($connection,	"SELECT * FROM sets WHERE Setname = '$search'"); //Lägg till kod som hanterar duplikantor av samma namn och ger någon varningsruta

	
	$convert_nametoID = mysqli_query($connection, "SELECT SetID, Year FROM sets WHERE Setname = '$search'");
	
	?>
	
		</div>
		<br>
		<div class="tabell">
			<?php
			 $conn = mysqli_connect("mysql.itn.liu.se","lego","","lego");
			 if(mysqli_errno($conn)) 
			 {
			  die("<p>MySQL error:</p>\n<p>" . mysqli_error($conn) . "</p>\n</body>\n</html>\n");
			 }
			 // Query for parts
			 
			 $contents = mysqli_query($connection, "SELECT * FROM collection LIMIT 0,10");
			 
			 if(mysqli_num_rows($contents) == 0) 
			 {
				print("<p>No parts in inventory for this set.</p>\n");
			 } 
				else 
			 {
			  // Table headings
			  print("<table>\n<tr>");
			  print("<th>Quantity</th>");
			  // The file name is displayed here for demonstration.
			  // It should typically not be presented to end users.
			  print("<th>Picture</th>");
			  print("<th>ColorID</th>");
			  print("<th>Color</th>");
			  print("<th>SetID</th>");
			  print("<th>Partname</th>");
			  print "</tr>\n";
			  
			  
			  
			  while($row = mysqli_fetch_array($contents)) 
			  {
				 
				   print("<tr>");
				   $Quantity = $row['Quantity'];
				   $SetID = $row['SetID'];
				   
				   $contents_pic = mysqli_query($connection, "SELECT * FROM inventory WHERE SetID LIKE '$SetID'");
				   
				   
				   while($row = mysqli_fetch_array($contents_pic)) 
				   {
					   
				   
					$SetID = $row['SetID'];
					// Determine the file name for the small 80x60 pixels image, with a preference for JPG format.
					$prefix = "http://www.itn.liu.se/~stegu76/img.bricklink.com/";
					$ItemID = $row['ItemID'];
					$ColorID = $row['ColorID'];
				   
					// Query the database to see which files, if any, are available
					$imagesearch = mysqli_query($connection, "SELECT * FROM images WHERE ItemTypeID='P' AND ItemID='$ItemID' AND ColorID=$ColorID");
				   
					// By design, the query above should return exactly one row.
					$imageinfo = mysqli_fetch_array($imagesearch);
				   
					
				   
					if($imageinfo['has_jpg']) 
					{ // Use JPG if it exists
					 $filename = "P/$ColorID/$ItemID.jpg";
					} 
					else if($imageinfo['has_gif']) 
					{ // Use GIF if JPG is unavailable
					 $filename = "P/$ColorID/$ItemID.gif";
					}
					else 
					{ // If neither format is available, insert a placeholder image
					 $filename = "hej";
					}
					print("<td>$Quantity</td>");
					print("<td><img src=\"$prefix$filename\" alt=\"Part $ItemID\"/></td>");
				   
					print("<td>$ColorID</td>");
				
					
				
					$colorsearch = mysqli_query($connection, "SELECT colors.Colorname FROM colors WHERE colors.ColorID LIKE '$ColorID'");
					
					while($row = mysqli_fetch_array($colorsearch))
						{
							$Colorname = $row['Colorname'];
							
							$partsearch= mysqli_query($connection, "SELECT parts.Partname FROM parts WHERE parts.partID LIKE '$ItemID'");
							while($row = mysqli_fetch_array($partsearch))
							{
								
							$Partname = $row['Partname'];
							print("<td>$Colorname</td>");
							print("<td>$SetID</td>");
							print("<td>$Partname</td>");
							}
						}
						print("</tr>\n");
					}
					
				}
			
			 }
			  print("</table>\n");
			 
			 
			 // An additional query for minifigs is required to show the full contents of a typical set.
			 // The structure for that query and its presentation is very similar to the parts list above.
			?>
		</div>
		</div>
	</body>
</html>