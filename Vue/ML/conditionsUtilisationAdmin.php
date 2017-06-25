<?php
session_start();
if($_SESSION['type']!=2)
{
  header("Location:../Controleur/action.php?action=error&error=notAdmin");
}
 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="../Styles/style.css" />
	</head>
	<body class="margin0">

		<div id="formulaire">
      <table class="mlTable" id="tabTitle" align="center">
        <tr>
          <td id="firstNameTd" align="middle" style='border-bottom:solid white thin; font-size:30px'>
            CONDITIONS GENERALES D'UTILISATION
          </td>
        </tr>
      </table>
      <div class="mlDIV">
				<table class="mlTable" align="center" id='mlTableAdmin'>
          <form action="action.php?action=modifierCGU" method="POST">
  					<tr>
  						<td id="textAreaTD" align="justify"  >
                  <textarea class="textarea" name="cgu" spellcheck="false"name="message" rows="10" cols="70" ><?php
                    $ml = getCGU($dbh);
                    echo $ml;
                  ?></textarea>
              </td>
  					</tr>
            <tr>
              <td style="text-align:center">
                <button type = "submit" class="buttonsubmit">Envoyer</button>
              </td>
            </tr>

				</table>
      </div>
		</div>

		<div class="container" id="accueil" >
			<p id="logoContainer"><a href="action.php?action=goToHome"><img align="middle"id="logo2" src="../img/logo_sansFond.png"></a></p>
			<img class ="imgBackground"src="../img/ml.jpg" style="position:relative; z-index=4;">
		</div>
	</body>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="../js/register.js"></script>
</html>
