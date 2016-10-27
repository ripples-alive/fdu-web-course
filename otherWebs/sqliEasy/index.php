<head>
    <title>烫烫烫烫烫烫烫</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<h1>SQL Injection Easy</h1>

<?php
     if (isset($_POST["user"]) && isset($_POST["password"])) {
       $username = $_POST["user"];
       $password = $_POST["password"];
       include("db.php");
       $sql = "SELECT * FROM bbb WHERE username='$username' and password='$password'";
       $result = mysql_query($sql);
       //if (!$result) {
       // die(mysql_errno().":".mysql_error()."\n");
       //}
       $row = mysql_fetch_row($result);
       if (!$row) {
         echo("Wrong username or password<br>");
         echo mysql_errno().":".mysql_error()."\n";
         ?>
         <form  action="index.php" method="post">
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
       <form  action="index.php" method="post">
         <input type="text" name="user">
         <input type="password" name="password">
         <input type="submit" name="submit" value="submit">
       </form>
       <em>Login as admin</em>

       <?php
     }
?>
