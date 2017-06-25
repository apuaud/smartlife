<?php

  if(isset($_POST['ml']))
  {
    $mlText = htmlspecialchars($_POST['ml']);

    setML($mlText, $dbh);
    echo "<script>alert('Les mentions légales ont bien été modifiées !');document.location.href='action.php?action=goToMLAdmin';</script>";

  }
  else {
    echo "<script>alert('Impossible de modifier les mentionsLegales');document.location.href='action.php?action=goToMLAdmin';</script>";

  }
 ?>
