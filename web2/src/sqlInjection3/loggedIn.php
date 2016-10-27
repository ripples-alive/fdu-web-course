<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
 ?>
<head>
    <title>Welcome</title>
    </head>
<body>
  <?php
  // echo var_dump($_SESSION);
  if (isset($_SESSION["username"])) {
    ?>
    <form action="/sqlInjection3/resetPassword.php">
        <input type="submit" value="重置密码"/>
    </form>
    <form action="/sqlInjection3/logout.php">
        <input type="submit" value="登出"/>
    </form>
    <?php
    if ($_SESSION["username"]=="admin"){
      echo "*CTF{HAVE_YOU_FIND?}<br>";
    }
  } else {
    echo "Not logged in yet";
  }
    ?>
</body>
