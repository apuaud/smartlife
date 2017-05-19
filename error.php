<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8"/>
      <link rel="stylesheet" href="StyleError.css" />
			<title>Mon espace personnel</title>
		</head>
		  <body class=erreur>
        <div class= TableauErreur>
  				<table align= center>
            <tr>
            <td>
             <img class= flotte src="images/alert2.png"> 
            </td>
              <td >
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
