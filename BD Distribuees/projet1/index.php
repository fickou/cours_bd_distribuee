<?php
require_once 'controllers/Controller.php';

$controller = new QueryController();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'clients':
        $controller->showClients();
        break;
    case 'commandes':
        $controller->showClientsWithOrders();
        break;
    default:
        require 'views/index.html';
}
?>