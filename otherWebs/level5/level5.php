<head>
    <title>烫烫烫烫烫烫烫</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<h1>Level 5</h1>

<?php
// if (!isset($_SERVER['PHP_AUTH_USER'])) {
//    header('WWW-Authenticate: Basic realm="My Realm"');
//    header('HTTP/1.0 401 Unauthorized');
//    echo 'Text to send if user hits Cancel button';
//    exit;
//  } else {
  //  if ($_SERVER['PHP_AUTH_USER']=="level5" && $_SERVER['PHP_AUTH_PW']=="BASE64_IS_THE_BEST") {
     if (isset($_POST["user"]) && isset($_POST["password"])) {
       $username = $_POST["user"];
       $password = $_POST["password"];
       include("db.php");
       $sql = "SELECT * FROM bbb WHERE username='$username' and password='password'";
       $result = mysql_query($sql);
       $row = mysql_fetch_row($result);
       if (!$row) {
         echo("Wrong username or password<br>");
         ?>
         <form  action="level5.php" method="post">
           <input type="text" name="user">
           <input type="password" name="password">
           <input type="submit" name="submit" value="submit">
         </form>
         <em>Login as admin</em>

         <?php
       } else {
         die("*CTF{SELECT_FLAG_FROM_42}");
       }
     } else {
       ?>
       <form  action="level5.php" method="post">
         <input type="text" name="user">
         <input type="password" name="password">
         <input type="submit" name="submit" value="submit">
       </form>
       <em>Login as admin</em>

       <?php
     }


 //   } else {
 //     header('WWW-Authenticate: Basic realm="My Realm"');
 //     header('HTTP/1.0 401 Unauthorized');
 //     echo 'Wrong Credentials';
 //   }
 // }
?>
