<?php

    // criação de classe

    final class TConnection
    {

        //metodo construct não existe

        private function __construct(){}

        //metodo open ()

        public static function open($name) {

            //verifica se existe o arquivo de configuracao para esse banco de dados

            if(file_exists("app.config/{$name}.ini")){

                //le o INI e retorna um array

                $db = parse_ini_file("app.config/{$name}.ini");

            }
            else
            {

                //se nao existir, lança um erro

                throw new Exception("Arquivo '$name' não encontrado");

            }
            //lê as informacoes contidas no arquivo

            $user = isset($db['user']) ? $db['user'] : NULL;
            $pass = isset($db['pass']) ? $db['pass'] : NULL;
            $name = isset($db['name']) ? $db['name'] : NULL;
            $host = isset($db['host']) ? $db['host'] : NULL;
            $type = isset($db['type']) ? $db['type'] : NULL;
            $port = isset($db['port']) ? $db['port'] : NULL;

            switch ($type)
            {

                case 'pgsql':

                    $port = $port ? $port : '5432';
                    $conn = new PDO("pgsql:dbname={$name}; user={$user}; password={$pass}; host=$host; port={$port}");

                    break;

                case 'mysql':
                    $port = $port ? $port : '3306';
                    $conn = new PDO("mysql:host={$host};port={$port};dbname={$name}", $user, $pass);    
                    
                    break;

                case 'sqlite':
                    $conn = new PDO("sqlite:{$name}");
                    
                    break;

                case 'ibase':
                    $conn = new PDO("firebird:dbname={$name}", $user, $pass);

                    break;

                case 'oci8':

                    $conn = new PDO("oci:dbname={$name}", $user, $pass);

                    break;
                    
                case 'mssql':
                    
                    $conn = new PDO("mssql:host={$host},1433;dbname={$name}", $user, $pass);
                    
                    break;
            }    
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;



        }

    }

?>   

