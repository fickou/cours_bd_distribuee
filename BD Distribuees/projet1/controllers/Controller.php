<?php
require_once 'models/Client.php';
require_once 'models/Commande.php';

class QueryController {
    public function showClients() {
        $clients = Client::getAllClients();
        require 'views/resultats.php';
    }
    
    public function showClientsWithOrders() {
        $data = Commande::getAllWithClients();
        require 'views/resultats.php';
    }
}
?>