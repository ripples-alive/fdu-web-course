<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    // session_destroy();
    unset($_SESSION["username"]);
    header("Location: /");
    echo "Logged out";
?>
