<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
 ?>

<head>
    <title>Reset Your Password</title>
</head>
    <body>
    <h1>Reset Password</h1>
    <form name="Reset Password" method="post">
        <div class="input"><span class="label">Old Password</span>
        <input id="oldPassword" type="password" name="oldPassword"/></div>
        <div class="input"><span class="label">New Password</span>
        <input id="newPassword" type="password" name="newPassword"/></div>
        <div class="actions"><input type="submit" value="submit"/></div>
    </form>
</body>


<?php
if (isset($_POST["oldPassword"])&&isset($_POST["newPassword"])) {
    $oldPassword = mysql_escape_string($_POST["oldPassword"]);
    $newPassword = $_POST["newPassword"];
    $username = $_SESSION["username"];
    include("db.php");
    $sql = "SELECT * FROM CCC where username='$username'";
    $result=mysql_query($sql);
    $row= mysql_fetch_row($result);
    if (!$row[1] || $row[1]!=$oldPassword) {
      die("Wrong password!");
    }
    $sql = "UPDATE CCC set password='$newPassword' WHERE username='$username'";
    $result = mysql_query($sql);
    if ($result) {
      echo "Updated";
    } else {
      echo "Unknown Error";
    }
}
?>
