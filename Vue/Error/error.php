<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8"/>
			<title>Mon espace personnel</title>
		</head>
		  <body>
        <div>
  				<table align="center">
            <tr>
              <td>
                Nous sommes désolés mais vous ne pouvez pas accéder à cette page pour la raison suivante : <br/>
                <?php
                $error = $_GET['error'];
                switch($error)
                {
                  case "notConnected" :
                    echo "Vous n'êtes pas connecté";
                    break;
                }
                ?>
              </td>
            </tr>
  				</table>
  			</div>
