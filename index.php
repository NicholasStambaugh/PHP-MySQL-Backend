<?php
// Include necessary files
require_once('config.php');
require_once('database.php');
require_once('classes/DataHandler.class.php');
require_once('classes/Security.class.php');
require_once('classes/Logger.class.php');
require_once('classes/Validator.class.php');
require_once('classes/ErrorHandler.class.php');
require_once('classes/Query.class.php');
require_once('classes/QueryBuilder.class.php');
require_once('classes/Model.class.php');
require_once('classes/Controller.class.php');
require_once('classes/View.class.php');

// Create new instance of Controller class
$controller = new Controller();

// Call the appropriate method based on the request method
switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $controller->get();
        break;
    case 'POST':
        $controller->post();
        break;
    case 'PUT':
        $controller->put();
        break;
    case 'DELETE':
        $controller->delete();
        break;
    default:
        $controller->error();
        break;
}
?>
