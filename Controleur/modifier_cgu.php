<?php

  if(isset($_POST['cgu']))
  {
    $cguText = htmlspecialchars($_POST['cgu']);
    setCGU($cguText, $dbh);
    echo "<script>alert('Les conditions d\'utilisation ont bien été modifiées !');document.location.href='action.php?action=goToCGUAdmin';</script>";
  }
  else {
    echo "<script>alert('Impossible de modifier les mentionsLegales');document.location.href='action.php?action=goToCGUAdmin';</script>";

  }
 ?>
