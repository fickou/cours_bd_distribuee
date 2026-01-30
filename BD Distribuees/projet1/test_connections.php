<?php
require_once 'config/database.php';

echo "Test des connexions aux bases de données...\n\n";

function testDatabase($site) {
    try {
        $db = Database::getConnection($site);
        echo "$site : Connecté avec succès\n";
        
        switch (self::$config[$site]['type']) {
            case 'mysql':
                $version = $db->query("SELECT VERSION()")->fetchColumn();
                break;
            case 'pgsql':
                $version = $db->query("SELECT version()")->fetchColumn();
                break;
            case 'sqlite':
                $version = $db->query("SELECT sqlite_version()")->fetchColumn();
                break;
        }
        
        echo "Version: $version\n";
        return true;
    } catch (Exception $e) {
        echo "$site : ERREUR - " . $e->getMessage() . "\n";
        return false;
    }
    
}

testDatabase('site1');  // MySQL
testDatabase('site2');  // PostgreSQL
testDatabase('site3');  // SQLite
?>