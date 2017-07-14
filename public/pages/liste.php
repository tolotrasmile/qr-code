<?php
/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 13/07/2017
 * Time: 21:18
 */

?>

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


<div class="container" style="margin-top: 80px">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <table class="table">
                <thead class="thead">
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
                        <th scope="row">
                            <a href="?id=<?php echo md5($document->id); ?>"><?= $document->number ?></a>
                        </th>

                        <td><?= $document->name ?></td>
                        <td><?= $document->type ?></td>
                        <td><?= $document->created_at ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar" style="position: fixed; right: 20px; top: 80px">
            <div class="sidebar-module sidebar-module-inset">

                <div class="row">
                    <?php if (isset($currentDocument)): ?>
                        <div class="sidebar-module sidebar-module-inset">
                            <h4>QR CODE</h4>
                            <img src="/public/img/code.png" alt="CODE QR" width="100%">

                            <p><?php echo $currentDocument->name ?></p>
                        </div>

                        <div class="btn-group" style="width: 100%;">
                            <a href="#" class="btn btn-primary">Modifier</a><br>
                            <a href="#" class="btn btn-danger">Supprimer</a>
                        </div>

                    <?php endif; ?>
                </div>


            </div>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /. container-->