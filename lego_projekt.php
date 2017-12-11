<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Projekt</title>
		<link href="lego_style.css" rel="stylesheet">
	</head>
	<body>
		<h1>Lego samling</h1>
		<br>
		<div id="tabell">		
		<?php
			$conn	=	mysqli_connect("mysql.itn.liu.se","lego","","lego");	
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$contents = mysqli_query($conn, "SELECT inventory.Quantity, inventory.ItemTypeID, inventory.ItemID, inventory.ColorID, colors.Colorname, parts.Partname FROM inventory, parts, colors WHERE inventory.SetID='375-2' AND inventory.ItemTypeID='P' AND inventory.ItemID=parts.PartID AND inventory.ColorID=colors.ColorID");
			if(mysqli_num_rows($contents) == 0) {
			print("<p>No parts in inventory for this set.</p>\n");
			} else {
				//Skriv ut
				print("<table>\n<tr>");	
				print("<th><h2>Quantity</h2></th>");
				print("<th><h2>File name</h2></th>");
				print("<th><h2>Picture</h2></th>");
				print("<th><h2>Color</h2></th>");
				print("<th><h2>Part name</h2></th>");
				print("</tr>\n");			
				while($row	= mysqli_fetch_array($contents)){
					print("<tr>");
					$quantity = $row['Quantity'];
					print("<td>$quantity</td>");
					$prefix = "http://www.itn.liu.se/~stegu76/img.bricklink.com/";				
					$item   = $row['ItemID'];
					$color	= $row['ColorID'];
					
					$image  = mysqli_query($conn, "SELECT * FROM images WHERE ItemTypeID='P' AND ItemID='$item' AND ColorID=$color");
					$imageinfo = mysqli_fetch_array($image);
					
					if($imageinfo['has_jpg']){
						$filename = "P/$color/$item.jpg";
					}
					else if($imageinfo['has_gif']){
						$filename = "P/$color/$item.gif";
					}
					else { 
						$filename = "noimage_small.png";
					}
					
					print("<td>$filename</td>");
					print("<td><img src=\"$prefix$filename\" alt=\"Part $item\"/></td>");
					$colorname	= $row['Colorname'];
					$partname = $row['Partname'];
					print("<td>$colorname</td>\n");
					print("<td>$partname</td>\n");				
					print("</tr>\n");																																																	
				}	//	end	while
					
				print("</table>\n");
			}
		?>
		</div>
	</body>
</html>
