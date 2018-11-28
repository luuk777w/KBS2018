<?php

namespace Core;

class DB
{
    public $connection;

    public function __construct()
    {
        try {
            $appsettings = new Appsettings();
            $connArray = $appsettings->getConnectionArray();

            $this->connection = new \PDO($connArray[0], $connArray[1], $connArray[2]);
        }catch (\PDOException $e){
            die("Database fout." . $e);
        }
    }

    public function sql($statement, $params = NULL)
    {

        if(substr($statement, 0, 6) === 'SELECT') {
            $sql = $this->connection->prepare($statement);
            $sql->execute($params);
            $data = $sql->fetchAll(\PDO::FETCH_OBJ);
            if($data == NULL)
                return NULL;

            return $data;
        } else {
            $sql = $this->connection->prepare($statement);
            return $sql->execute($params);
        }
    }

}


