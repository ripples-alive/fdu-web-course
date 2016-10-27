<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if (isset($_SESSION["username"])) {
  header("Location: /sqlInjection3/loggedIn.php");
}
?>
<head>
    <title>Register</title>
</head>
    <body>
        <h1>Register</h1>
        <form name="Register" method="post">
            <div class="input">
                <span class="label">Username</span>
                <input id="username" type="text" name="username"/>
            </div>
            <div class="input">
                <span class="label">Password</span>
                <input id="password" type="password" name="password"/>
            </div>
            <div class="actions"><input type="submit" value="submit"/></div>
        </form>
</body>

<?php

if (isset($_POST["username"])&&isset($_POST["password"])) {
    $username = mysql_escape_string($_POST["username"]);
    $password = mysql_escape_string($_POST["password"]);
    include("db.php");
    $sql = "SELECT * FROM CCC where username='$username'";
    $result=mysql_query($sql);
    $row= mysql_fetch_row("$result");
    if (!$row[1] || $row[1]!=$password) {
        $update_sql = "INSERT into CCC values('$username', '$password')";
        $result = mysql_query($update_sql);
        if ($result ) {
          die("Success");
        } else {
          die("Unknown Error");
        }
    } else {
        die("User Exists");
    }
}
?>
