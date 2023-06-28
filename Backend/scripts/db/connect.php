<?php

    namespace App;

    class connect{
        public $con;
        function __construct(){
            try{
                $this->con=new \PDO($_ENV["DSN"].":host=".$_ENV["HOST"].";dbname=".$_ENV["DBNAME"].";user=". $_ENV["USERNAME"].";password=".$_ENV["PASSWORD"].";port=". $_ENV["PORT"]);
                $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION, \PDO:: ATTR_PERSISTENT, \PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::MYSQL_ATTR_INIT_COMMAND, \PDO::ATTR_EMULATE_PREPARES);

            } catch(\PDOException $e){
                echo "Connection Failed: ".$e->getMessage();
            }
            return $this->con;
        }
    }

?>