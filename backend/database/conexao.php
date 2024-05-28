<?php
class Conexao {
    private static $instance;

    public static function getConn(){
        try {
            if (!isset(self::$instance)){
                self::$instance = new \PDO('pgsql:host=localhost;dbname=e_commercer', 'postgres', 'root');

                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
            return self::$instance;
        } catch (\PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();

            return null; 
        }
    }
}

/*
Quando for configurar no Xampp (em modo administrador) o banco use apenas o Apache e altera uma configuração dele, no PHP(php.ini), remova o ";" de extension=pdo_pgsql e salve depois reinicio tudo.
Observação lembre de manter o usuario "postgres" e senha "root"!!!

*/
?>
