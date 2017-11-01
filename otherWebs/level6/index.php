<head>
    <title>Torrent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<h1>Level 6</h1>

<?php
// if (!isset($_SERVER['PHP_AUTH_USER'])) {
//    header('WWW-Authenticate: Basic realm="My Realm"');
//    header('HTTP/1.0 401 Unauthorized');
//    echo 'Text to send if user hits Cancel button';
//    exit;
//  } else {
//    if ($_SERVER['PHP_AUTH_USER']=="level6" && $_SERVER['PHP_AUTH_PW']=="SELECT_FLAG_FROM_42") {
     if (isset($_POST["torrent"])) {
      $torrent = $_POST["torrent"];
      $ext = array_pop(explode ( ".",$torrent));
      // echo $torrent."<br>";
      // echo "$ext"."<br>";
      if ($ext!="torrent") {
        echo("invalid filename");
        ?>
        <form  action="" method="post">
          <input type="text" name="torrent">
          <input type="submit" name="submit" value="submit">
        </form>
        <em>torrents downloader</em>
        <?php
        exit();
      }
      $cmd = "/usr/bin/curl \"$torrent\"  2>&1";
      $retval = -123;
      exec("$cmd");
      echo "Torrent downloaded<br>";

      ?>
      <form  action="" method="post">
        <input type="text" name="torrent">
        <input type="submit" name="submit" value="submit">
      </form>
      <em>Hand over your torrents</em>
      <?php
     } else {
       ?>
       <form  action="" method="post">
         <input type="text" name="torrent">
         <input type="submit" name="submit" value="submit">
       </form>
       <em>Hand over your torrents</em>
       <?php
     }
 //   } else {
 //     header('WWW-Authenticate: Basic realm="My Realm"');
 //     header('HTTP/1.0 401 Unauthorized');
 //     echo 'Wrong Credentials';
 //   }
 // }
?>
