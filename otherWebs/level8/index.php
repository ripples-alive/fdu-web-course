<head>
    <title>Cascading Style Sheets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<h1>Level 8</h1>

<?php
// if (!isset($_SERVER['PHP_AUTH_USER'])) {
//    header('WWW-Authenticate: Basic realm="My Realm"');
//    header('HTTP/1.0 401 Unauthorized');
//    echo 'Text to send if user hits Cancel button';
//    exit;
//  } else {
//    if ($_SERVER['PHP_AUTH_USER']=="level8" && $_SERVER['PHP_AUTH_PW']=="FCKEDITOR_UPLOADING") {
     if (isset($_POST["advice"])) {
//       echo $_POST["advice"];
       //exec("echo \"".$_POST["advice"]."\" >> advices");
       file_put_contents("advices", $_POST["advice"]);
      //  echo $_POST["advice"];
       echo "Submit success, waiting for administrator to read";
       ?>
       <form class="" action="index.php" method="post">
        <input type="text" name="advice" placeholder="advice here">
        <input type="submit">
       </form>
       <?php
     } else {
       ?>
       <em>Any advice for administrator?</em>
       <form class="" action="index.php" method="post">
        <input type="text" name="advice" placeholder="advice here">
        <input type="submit">
       </form>
       <?php
     }
 //   } else {
 //     header('WWW-Authenticate: Basic realm="My Realm"');
 //     header('HTTP/1.0 401 Unauthorized');
 //     echo 'Wrong Credentials';
 //   }
 // }
?>
