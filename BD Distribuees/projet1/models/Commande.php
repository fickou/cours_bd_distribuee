<?php
require_once 'config/database.php';

class Commande {
    public static function getAllWithClients() {
        $db1 = Database::getConnection('site1');
        $db2 = Database::getConnection('site2');
        $db3 = Database::getConnection('site3');
        
        $result = [];
        
        // Récupérer les commandes avec les clients de Dakar
        $query1 = "SELECT c.nclient, c.nom, c.ville, cmd.ncde, cmd.produit, cmd.qte 
                   FROM client c 
                   LEFT JOIN site3_db.commande cmd ON c.nclient = cmd.nclient";
        $stmt1 = $db1->query($query1);
        $result['dakar'] = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        
        // Récupérer les commandes avec les clients hors Dakar
        $query2 = "SELECT c.nclient, c.nom, c.ville, cmd.ncde, cmd.produit, cmd.qte 
                   FROM client c 
                   LEFT JOIN site3_db.commande cmd ON c.nclient = cmd.nclient";
        $stmt2 = $db2->query($query2);
        $result['autres'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
}
?>