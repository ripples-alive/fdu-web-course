<head>
    <title>烫烫烫烫烫烫烫</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<h1>SQL Injection Normal</h1>

<?php
     if (isset($_POST["user"]) && isset($_POST["password"])) {
       $username = $_POST["user"];
       $password = $_POST["password"];
//       echo var_dump($_POST["password"]);
       include("db.php");
       //$username = str_replace(" ", "", $username);
       //$password = str_replace(" ", "", $password);
       $sql = "SELECT * FROM ccc WHERE username='$username'";
       $result = mysql_query($sql);
       //if (!$result) {
       // die(mysql_errno().":".mysql_error()."\n");
       //}
       $row = mysql_fetch_row($result);
//       echo var_dump($row[1])."<br>";
       if (!$row[1] || $row[1]!=$password) {
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
         die("*CTF{HAVE_YOU_SEEN_SQLMAP?}");
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
