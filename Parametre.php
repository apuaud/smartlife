<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Styles/StyleParametre.css" />
        <title>Paramètre</title>
    </head>
	<?php include("Vue/EspacePerso/TestHeader.php") ?>
	<h1>
		Paramètres
	</h1>
    <body class=parametreBody>
    
    <div class="divHori">
    	<button class="compte"> Ajouter un compte secondaire </button>
    <form action="inscription_secondaire.php" method="post">
    	<input class="zonetexte" type="text" name="email" placeholder="Email">
        <input class="zonetexte" type="text" name="lastName" placeholder="Prénom">
        <input class="zonetexte" type="text" name="firstName" placeholder="Nom">
        <input class="zonetexte" type="text" name="id" placeholder="Pseudo">
        <input class="zonetexte" type="text" name="pw" placeholder="Mot de passe">
        <input class="zonetexte" type="text" name="pw2" placeholder="Confirmer MDP">
        <input type="radio" name="type" value=2>Voir l'état des capteurs<br>
        <input type="radio" name="type" value=3>Voir l'état des capteurs + ajouter pièces et maisons<br>
    	<button class="oui" type="submit"> Valider </button>
    </form>
    </div>
    <div class="divHori">
    	<button class="compte"> Modifier mon pseudo </button>
    	<input class="zonetexte" type="text" name="ancien pseudo" placeholder="ancien pseudo">
    	<input class="zonetexte" type="text" name="nouveau pseudo" placeholder="nouveau pseudo">
    	<input class="zonetexte" type="text" name="confirmer votre pseudo" placeholder="confirmer votre pseudo">
    	<button class="oui" type="submit"> Valider </button>
    </div>
    <div class="divHori">
    	<button class="compte"> Modifier mon mot de passe </button>
    	<input class="zonetexte" type="text" name="ancien mot de passe" placeholder="ancien mot de passe">
    	<input class="zonetexte" type="text" name="nouveau mot de passe" placeholder="nouveau mot de passe">
    	<input class="zonetexte" type="text" name="confirmer votre mot de passe" placeholder="confirmer votre mdp">
    	<button class="oui" type="submit"> Valider </button>
    </div>
    <div class="divHori">
    	<button class="compte"> Supprimer une maison</button>
    </div>
    <div class="divHori">
    	<button class="compte"> Supprimer mon compte </button>
    	<button class="Supprimer"> Toute suppression est définitive </button>
    </div>
    </body>
</html>
