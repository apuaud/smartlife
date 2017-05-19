<?php
session_start();

if(isset($_SESSION['id']))
{
	$functionCalledOnAccountClick = "callAccount()";
}
else
{
	$functionCalledOnAccountClick ="displayFormulaire()";
}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="http://puaud.eu/appmvc/Styles/style.css"  />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		
		<div id="formulaire">
			<?php include ("formulaire.php") ?>
		</div>

		<?php include ("selectionLangue.php") ?>
		

		<?php include ("contenu.php") ?>

	

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js">
		</script>
		<script type="text/javascript" src="http://puaud.eu/appmvc/Vue/Index/firstPage.js"></script>

	</body>
</html>
