
<?php ob_start() ?>
<p class="langueselect">
	<a href="http://puaud.eu/appmvc/Controleur/action.php?action=goToLanguefr">
		<button class="buttonlangue" name="fr">
			<img src="http://www.oneturf.fr/images/fr.gif" alt="fr" style="height:15px;max-width:auto;" />
	</a>
		</button> |
		<a href="http://puaud.eu/appmvc/Controleur/action.php?action=goToLangueen">
		<button class="buttonlangue" name="en">
			<img src="http://www.oneturf.fr/images/gb.gif" alt="en" style="height:15px;max-width:auto;" />
		</button>
	</a>
</p>

<?php $selectionLangue = ob_get_clean(); 
		include('gabaritEn.php');
?>