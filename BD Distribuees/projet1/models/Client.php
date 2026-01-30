<?php
require_once 'config/database.php';

class Client {
    public static function getAllClients() {
        $clients = [];
        
        // Clients de Dakar (Site 1)
        $db1 = Database::getConnection('site1');
        $stmt1 = $db1->query("SELECT nclient, nom, ville FROM client");
        $clients['dakar'] = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        
        // Clients hors Dakar (Site 2)
        $db2 = Database::getConnection('site2');
        $stmt2 = $db2->query("SELECT nclient, nom, ville FROM client");
        $clients['autres'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        
        return $clients;
    }
}
?>