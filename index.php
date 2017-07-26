<?php
/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 27/06/2017
 * Time: 10:39
 */

require 'vendor/autoload.php';

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    \App\Controller\LoginController::__doLogin($_POST['username'], $_POST['password']);
}

//PHPQRCode\QRcode::png($json, "tmp/code.png", \PHPQRCode\Constants::QR_ECLEVEL_L, 20, 2);

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QR Code</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/tether.min.css">
    <link rel="stylesheet" href="public/assets/css/signin.css">
</head>
<body>

<script src="vendor/components/jquery/jquery.min.js"></script>

<?php

$headers = \apache_response_headers();

if (isset($_SESSION['login'])) {
    include 'public/pages/liste.php';
} else {
    include 'public/pages/login.php';
}
?>

<script src="public/assets/js/tether.min.js"></script>
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>