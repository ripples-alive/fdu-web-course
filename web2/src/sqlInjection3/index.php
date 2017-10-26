<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if (isset($_SESSION["username"])) {
  header("Location: loggedIn.php");
}

if (isset($_POST["username"])&&isset($_POST["password"])) {
        $username = mysql_escape_string($_POST["username"]);
        $password = mysql_escape_string($_POST["password"]);
        include("db.php");
        $sql = "SELECT * FROM CCC WHERE username='$username'";
        // echo $sql;
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        // echo var_dump($row[1])."<br>";

        if (!$row[1] || $row[1]!=$password) {
            die("Wrong username or password<br>");
          //  echo mysql_errno().":".mysql_error()."\n";
        } else {
            $_SESSION['username']=$username;
            // echo var_dump($_SESSION);
            header("Location: loggedIn.php");
        }
}
?>

<head>
    <title>Lolipops</title>
</head>
<body>
    <h1>Login with admin</h1>
</body>
<form name="login" method="post">
    <div class="input">
        <span class="label">Username</span>
        <input id="username" type="text" name="username"/>
    </div>
    <div class="input">
        <span class="label">Password</span>
        <input id="password" type="password" name="password"/>
    </div>
    <div class="actions">
        <input type="submit" value="登录"/>
    </div
></form>

<form action="register.php"><input type="submit" value="注册"/></form>
