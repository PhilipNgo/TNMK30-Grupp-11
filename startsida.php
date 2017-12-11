<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Projekt startsida</title>
		<link href="lego_style.css" rel="stylesheet">
	</head>
	<body>
		<div id="block">
		<div id="header"><h1>Lego</h1>
			<ul>
				<li><a class="knapp" href="EP_projekt.php">Lego samling</a></li>
				<li><a class="knapp" href="lank.php">Länk</a></li>
			</ul>
		</div>
		<div id="sok">
		<?PHP

			include("connect.php");

			echo "<form method = 'post' action='search_satser.php'>
			<input type='text' name='search'>
			<input type='submit' value='Sök på Legosats'>
			</form>";
		?>
		</div>
		
		<h3 id="intro-text">Hej Niklas! Här kommer din personliga sida för din lego samling. Ovanför i menyn kan du
		se hela din samling, söka på saknade bitar för ditt nya projekt samt hitta länkar till olika sidor som
		kan sälja de bitar du saknar!</h3>
		</div>		
	</body>
</html>

