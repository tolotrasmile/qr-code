<?php
/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 13/07/2017
 * Time: 21:18
 */

use App\Query;

$documents = Query::fetchAll('SELECT * FROM documents ORDER BY documents.number ASC');

/** get curent document */
if (isset($_GET['id'])) {

    $md5Id = $_GET['id'];
    $currentDocument = Query::fetchOne("SELECT * FROM documents WHERE MD5(id)='$md5Id'");

    if ($currentDocument) {
        \App\Generator\CodeGenerator::generate(json_encode($currentDocument));
    }
}

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

        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

</nav>


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


<div class="container-fluid" style="margin-top: 100px"><!-- To get it to take up the whole width -->

    <div class="row top">

    </div><!-- row -->

    <div class="row main-content">

        <div class="col-md-9 scrollable">

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
                        <td width="190px"><?= $document->created_at ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>

        <div class="col-md-3">

            <div class="sub-header">
                <!-- sub header -->
            </div>

            <div class="scrollable">
                <?php if (isset($currentDocument)): ?>
                    <div>
                        <h4>QR CODE</h4>
                        <img src="/public/img/code.png" alt="CODE QR" width="70%">
                        <p><?php echo $currentDocument->name ?></p>
                    </div>
                    <div class="btn-group" style="width: 100%;">
                        <a href="#" class="btn btn-primary" style="width: 50%" data-toggle="modal"
                           data-target="#myModal">Modifier</a><br>
                        <a href="#" class="btn btn-danger" style="width: 50%">Supprimer</a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="sub-footer">
                <!-- sub footer -->
            </div>

        </div>
    </div><!-- row -->


    <div class="row bottom">

    </div><!-- row bottom -->

</div><!-- container-fluid -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>

<script>
  $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })

  $.post("public/api/index.php",{ action: 'deleteDocument', id: 1 }, function (data) {
    console.log(data)
  });

</script>