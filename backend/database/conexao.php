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
            // Tratar o erro de conexão de acordo com suas necessidades
            echo "Erro de conexão: " . $e->getMessage();
            // Ou lançar a exceção novamente para que seja tratada em outro lugar
            // throw $e;
            return null; // Ou retornar null ou false, indicando falha na conexão
        }
    }
}


?>
