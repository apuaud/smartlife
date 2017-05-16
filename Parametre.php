<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="StyleParametre.css" />
        <title>Paramètre</title>
    </head>
	<?php include("TestHeader.php") ?>
	<h1>
		Paramètres
	</h1>
    <body class=parametreBody>
    
    <div class="divHori">
    	<button class="compte"> Ajouter un compte secondaire </button>
    	<input class="zonetexte" type="text" name="pseudo du second compte" placeholder="pseudo">
    	<input class="zonetexte" type="text" name="mot de passe" placeholder="mot de passe">
    	<button class="oui" type="submit"> Valider </button>
    </div>
    <div class="divHori">
    	<button class="compte"> modifier mon pseudo </button>
    	<input class="zonetexte" type="text" name="ancien pseudo" placeholder="ancien pseudo">
    	<input class="zonetexte" type="text" name="nouveau pseudo" placeholder="nouveau pseudo">
    	<input class="zonetexte" type="text" name="confirmer votre pseudo" placeholder="confirmer votre pseudo">
    	<button class="oui" type="submit"> Valider </button>
    </div>
    <div class="divHori">
    	<button class="compte"> modifier mon mot de passe </button>
    	<input class="zonetexte" type="text" name="ancien mot de passe" placeholder="ancien mot de passe">
    	<input class="zonetexte" type="text" name="nouveau mot de passe" placeholder="nouveau mot de passe">
    	<input class="zonetexte" type="text" name="confirmer votre mot de passe" placeholder="confirmer votre mdp">
    	<button class="oui" type="submit"> Valider </button>
    </div>
    <div class="divHori">
    	<button class="compte"> supprimer une maison</button>
    </div>
    <div class="divHori">
    	<button class="compte"> Supprimer mon compte </button>
    	<button class="Supprimer"> Toute suppression est définitive      </button>
    </div>
    </body>
</html>
