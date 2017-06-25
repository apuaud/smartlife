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
          <td id="firstNameTd" align="middle" style='border-bottom:solid white thin; font-size:30px' >
            CONDITIONS GENERALES D'UTILISATION
          </td>
        </tr>
      </table>
      <div class="mlDIV">
				<table class="mlTable" align="center">
					<tr>
						<td id="firstNameTd" align="justify" style="white-space:pre-wrap;text-align:justify">
              <?php
                $ml = getCGU($dbh);
                echo $ml;
              ?>
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
