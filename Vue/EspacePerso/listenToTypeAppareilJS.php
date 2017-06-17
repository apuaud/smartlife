<script>
$(document).ready(function () {
  $("#selectAjoutCapteur").change(function () {
      var idMaison = <?php echo json_encode($_GET['maison']); ?>;
      var idPiece = <?php echo json_encode($_GET['piece']); ?>;
      var idAppareil = $("#selectAjoutCapteur").val();
      document.location.href=
      "http://puaud.eu/appmvc/Vue/EspacePerso/account.php?focus1=itemEspacePerso&focus2=logoMaison&ajoutCapteur=true&" +
      "idAppareil=" + idAppareil + "&" +
      "maison=" + idMaison + "&" +
      "piece=" + idPiece;
    });
});
</script>
