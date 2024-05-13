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
// Quando for fazer a conexão no postgress, para evitar problemas, você o nome padrão do banco é postgres
// e a senha root é minha. 

//Lembrem de adicionar a configuração do php.ini no apache, pôs o postgress necessista que vc habilite o pdo com postgres.

// ;extension=pdo_pgsql vai estar assim no php.ini, coloque assim |extension=pdo_pgsql|

?>
