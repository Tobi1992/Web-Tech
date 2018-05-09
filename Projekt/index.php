<?php
	$site = isset($_GET['content']) ? $_POST['content'] : 'startseite';
	$site .= '.php';
?>
<html>
<head>
    <title>Login-Bereich</title>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"> 
</head>
<body>

	<div id="body" align="center">
		<div id="top">
			<a href="Web-Tech%20Projekt/index.php?content=seite2">Gehe auf Seite 2</a>
			<a href="Web-Tech%20Projekt/index.php?content=seite25">Gehe auf Seite 25</a>
		</div>

		<div id="content" align="center">
			<?php include($site); ?>
		</div>
	</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>