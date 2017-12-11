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
				<li><a class="knapp" href="startsida.php">Välkommen</a></li>
				<li><a class="knapp" href="EP_projekt.php">Lego samling</a></li>
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
		
		<h3 id="intro-text">Om det skulle visa sig att du saknar bitar i din enorma samling 
		så kanske dessa sidor kan hjälpa dig att hitt det du behöver</h3>
		
		<div id="lankar">
			<ul class="links">
				<li><a class="knapp" href="https://ebrix.se/">Ebrix</a></li><br>
				<li><a class="knapp" href="https://www.brickowl.com/">Brick Owl</a></li><br>
				<li><a class="knapp" href="https://www.bricklink.com/v2/main.page">Bricklink</a></li>
			</ul>
		</div>
		</div>		
	</body>
</html>
