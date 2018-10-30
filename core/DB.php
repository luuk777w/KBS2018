<?php

namespace Core;

class DB
{
    public $connection;

    public function __construct()
    {
        try {
            $this->connection = new \PDO('mysql:host=localhost; dbname=wideworldimporters;', 'root', '');
        }catch (\PDOException $e){
            die("Database fout." . $e);
        }
    }

    public function sql($statement)
    {
        $sql = $this->connection->prepare($statement);
        $result = $sql->execute($exArr);

        return $result;
    }

    public function create($table, $array)
    {
        $columns = '';
        $exArr = [];
        $prepare = '';

        foreach ($array as $key => $value){
            $columns .= $key.", ";
            array_push($exArr, $value);
            $prepare .= '?, ';
        }

        $sql = $this->connection->prepare("INSERT INTO ${table} (".rtrim($columns, ', ').") VALUES (".rtrim($prepare, ', ').") ");
        $result = $sql->execute($exArr);

        return $result;
    }

    /**
     * @return string
     */
    public function read($table, $condition = '')
    {
        $sql = $this->connection->prepare("SELECT * FROM ${table} ${condition}");
        $sql->execute(['35']);
        $result = $sql->fetchAll(\PDO::FETCH_OBJ);

        return $result;
    }

    /**
     * @param $table
     * @param $array
     * @return bool
     */
    public function update($table, $condition, $array)
    {
        $exArr = [];
        $prepare = '';
        $set = '';

        foreach ($array as $key => $value){
            array_push($exArr, $value);
            $set .= $key.' = ?, ';
        }

        $sql = $this->connection->prepare("UPDATE ${table} SET ".rtrim($set, ', ')." WHERE ${condition} ");
        $result = $sql->execute($exArr);

        return $result;
    }

    public function delete($table, $condition)
    {
        $sql = $this->connection->prepare("DELETE FROM ${table} WHERE ${condition}");
        $result = $sql->execute();

        return $result;
    }

}


