<head>
    <title>Intuition approach</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<h1>Level 1</h1>

<?php
// if (!isset($_SERVER['PHP_AUTH_USER'])) {
//    header('WWW-Authenticate: Basic realm="My Realm"');
//    header('HTTP/1.0 401 Unauthorized');
//    echo 'Text to send if user hits Cancel button';
//    exit;
 // } else {
  //  if ($_SERVER['PHP_AUTH_USER']=="level1" && $_SERVER['PHP_AUTH_PW']=="DO_NOT_HIDE_MESSAGE_IN_HTML") {
     $headers = getallheaders();
     if (array_key_exists( 'X-Forwarded-For', $headers)) {
        $xff = $headers['X-Forwarded-For'];
        if ($xff == "localhost" || $xff == "127.0.0.1") {
          echo("*CTF{SAME_AS_REFERER}");
        } else {
          die("Can only visited by localhost");
        }
     } else {
       die("Can only visited by localhost");
     }
 //   } else {
 //     header('WWW-Authenticate: Basic realm="My Realm"');
 //     header('HTTP/1.0 401 Unauthorized');
 //     echo 'Wrong Credentials';
 //   }
 // }
?>
