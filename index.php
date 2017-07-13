<?php
/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 27/06/2017
 * Time: 10:39
 */

use App\Query;

require 'vendor/autoload.php';

$documents = Query::fetchAll('SELECT * FROM documents ORDER BY documents.created_at DESC');

//$json = json_encode($user);

//\App\Generator\CodeGenerator::generate($json);

//PHPQRCode\QRcode::png($json, "tmp/PHPQRCode.png", \PHPQRCode\Constants::QR_ECLEVEL_L, 20, 2);

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QR Code</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/tether.min.css">
</head>
<body>

<nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">QR Code</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<!--<section class="jumbotron text-center" style="margin-top: 55px;">
    <div class="container">
        <h1 class="jumbotron-heading">QR Code example</h1>
        <p class="lead text-muted">Serialized : <?php /*echo $json */ ?></p>

        <div class="row">
            <div class="col-md-6">
                <img src="tmp/PHPQRCode.png" alt="TEXT" style="width: 200px; height: 200px; margin-bottom: 20px;">
                <p>PHPQRCode</p>
            </div>

            <div class="col-md-6">
                <img src="tmp/Endroid.png" alt="TEXT" style="width: 200px; height: 200px; margin-bottom: 20px;">
                <p>Endroid</p>
            </div>
        </div>
        <p>
            <a href="#" class="btn btn-secondary">Reload</a>
        </p>
    </div>
</section>-->
<div class="container" style="margin-top: 55px;">
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>NUM</th>
            <th>NOM</th>
            <th>TYPE</th>
            <th>DATE</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($documents as $document) : ?>
            <tr>
                <th scope="row"><?= $document->number ?></th>
                <td><?= $document->name ?></td>
                <td><?= $document->type ?></td>
                <td><?= $document->created_at ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="vendor/components/jquery/jquery.min.js"></script>
<script src="public/assets/js/tether.min.js"></script>
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>