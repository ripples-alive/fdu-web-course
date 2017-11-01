<?php session_start(); ?>

<?php
if (!isset($_POST['mobile'])) {
    echo '{"msg":"invalid mobile"}';
    die();
}

if ($_POST['mobile'] !== '18888888888') {
    echo '{"msg":"not registered"}';
    die();
}

$key = 'code-' . $_POST['mobile'];
$_SESSION[$key] = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
$_SESSION["$key-time"] = time();

// echo '{"msg":"success"}';
echo '{"msg":"'.$_SESSION[$key].'"}';
