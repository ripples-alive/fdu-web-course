<head>
    <title>Include "stdio.h"</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<h1>Level 4</h1>

<?php
     $flag = "*CTF{BASE64_IS_THE_BEST}";
     if (isset($_GET["target"])) {
       $target = $_GET["target"];
       if ($target=="hei.gif" || $target=="level4.php"){
         $path = "$target";
         $type = pathinfo($path, PATHINFO_EXTENSION);
         $data = file_get_contents($path);
         $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
         echo "<img src=\"$base64\"></img>";
       } else {
         echo "File Not Found";
       }
     } else {
       header("location: level4.php?target=hei.gif");
     }
?>
