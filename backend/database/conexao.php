<?php

class Conexao {
    private static $instance;

    public static function getConn(){

        if (!isset(self::$instance)){
            // Substitua 'dbname' pelo nome do seu banco de dados PostgreSQL
            self::$instance = new \PDO('pgsql:host=localhost;dbname=e_comerce', 'root', '');
        }
        return self::$instance;
    }

}
?>
