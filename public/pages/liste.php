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
                <?php if (isset($currentDocument) && $currentDocument instanceof stdClass): ?>
                    <div>
                        <h4>QR CODE</h4>
                        <img src="/public/img/code.png" alt="CODE QR" width="70%">
                        <p><?php echo $currentDocument->name ?></p>
                    </div>
                    <div class="btn-group" style="width: 100%;">
                        <a href="#" class="btn btn-primary" style="width: 35%" data-toggle="modal"
                           data-target="#documentDetailModal">Modifier</a><br>
                        <a id="deleteDocument" data-id="<?= $currentDocument->id ?>" href="#" class="btn btn-danger"
                           style="width: 35%">Supprimer</a>
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
<?php if (isset($currentDocument) && $currentDocument instanceof stdClass): ?>
    <div class="modal fade" id="documentDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-modal" class="form-group">
                        <label for="recipient-name" class="form-control-label">NOM:</label>
                        <input type="text" class="form-control" name="name"
                               value="<?php echo $currentDocument->name ?>">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" id="save-document" class="btn btn-primary">Enregister</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>

  const API_URL = 'public/api/index.php';

  $('#deleteDocument').click((e) => {

    e.preventDefault();

    if (confirm("Voulez-vous supprimer le document?")) {

      const id = getParameterByName('id');

      $.post(API_URL, {action: 'deleteDocument', id: id})
        .done((data) => {
          location.reload();
        })
        .fail(() => {
          alert("Erreur lors de la suppression");
        })
    }
  });

  $('#save-document').click((e) => {

    e.preventDefault();

    const id = getParameterByName('id');
    $('#documentDetailModal').modal('hide');

    const formData = $('#form-modal').serializeArray()[0];
    const params = Object.assign(formData, {action: 'updateDocuments', id: id});

    $.post(API_URL, params)
      .done((data) => {
        //console.log(data);
        location.reload();
      })
      .fail((error) => {
        console.log(error);
        alert("Erreur lors de la suppression");
      });

  });

  function getParameterByName(name) {

    const url = window.location.href;

    name = name.replace(/[\[\]]/g, "\\$&");

    const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"), results = regex.exec(url);

    if (!results) return null;
    if (!results[2]) return '';

    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }


</script>