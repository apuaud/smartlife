<script>
$(document).ready(function () {
  $( "#addCapteur" ).click(function() {
    var idMaison = <?php echo json_encode($_GET['maison']); ?>;
    var idPiece = <?php echo json_encode($_GET['piece']); ?>;
    var idAppareil = <?php echo json_encode($_GET['idAppareil']); ?>;
    var numeroSerie = $('#numeroSerieInput').val();
    document.location.href=
    "http://puaud.eu/appmvc/Controleur/ajouter_capteur.php?ajoutCapteur=true&" +
    "idAppareil=" + idAppareil + "&" +
    "maison=" + idMaison + "&" +
    "piece=" + idPiece + "&" +
    "numeroSerie=" + numeroSerie;
  });
});

$(document).ready(function () {
  $( "#numeroSerieInput" ).keypress(function() {
    $( "#addCapteur").show();
  });
});


</script>
