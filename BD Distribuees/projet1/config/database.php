<?php
class Database {
    private static $instances = [];
    
    private static $config = [
        'site1' => [
            'type'  => 'mysql',
            'host'  => 'localhost',
            'db'    => 'site1_db',
            'user'  => 'site1_user',
            'pass'  => 'site1_pass',
            'port'  => 3306
        ],
        'site2' => [
            'type'  => 'pgsql',
            'host'  => 'localhost',
            'db'    => 'site2_db',
            'user'  => 'site2_user',
            'pass'  => 'site2_pass',
            'port'  => 5433
        ],
        'site3' => [
            'type'  => 'sqlite',
            'path'  => 'C:/BD_Distribuees/site3_db.sqlite'
        ]
    ];
    
    public static function getConnection($site) {
        if (!isset(self::$instances[$site])) {
            try {
                $db = self::$config[$site];
                
                switch ($db['type']) {
                    case 'mysql':
                        $dsn = "mysql:host={$db['host']};port={$db['port']};dbname={$db['db']};charset=utf8";
                        self::$instances[$site] = new PDO($dsn, $db['user'], $db['pass'], [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                        ]);
                        break;
                        
                    case 'pgsql':
                        $dsn = "pgsql:host={$db['host']};port={$db['port']};dbname={$db['db']}";
                        self::$instances[$site] = new PDO($dsn, $db['user'], $db['pass'], [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                        ]);
                        break;
                        
                    case 'sqlite':
                        $dsn = "sqlite:{$db['path']}";
                        self::$instances[$site] = new PDO($dsn, null, null, [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                        ]);
                        break;
                }
                
            } catch (PDOException $e) {
                die("Erreur de connexion au site $site: " . $e->getMessage());
            }
        }
        return self::$instances[$site];
    }
}
?>