<?php
/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 25/07/2017
 * Time: 20:30
 */

use App\Controller\ApiController;

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require '../../vendor/autoload.php';

$result = new stdClass();

if (isset($_POST['action'])) {

    switch ($_POST['action']) {

        case 'login': {
            if (isset($_POST['username']) && isset($_POST['username'])) {
                $result->data = ApiController::login($_POST['username'], $_POST['password']);
            }
        }
            break;

        case 'updateDocuments': {
            if (isset($_POST['id']) && isset($_POST['value'])) {
                $result->data = ApiController::updateDocuments($_POST['value'], $_POST['id']);
            }
        }
            break;

        case 'deleteDocument': {
            if (isset($_POST['id'])) {
                $result->data = ApiController::deleteDocument($_POST['id']);
            }
        }
            break;
    }
}

echo json_encode($result);