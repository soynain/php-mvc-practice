<?php
class DatabaseRepository
{
    public $dsn;
    private static $connection;
    public function __construct()
    {
        $this->initDbConnection();
    }

    private function initDbConnection(){
        try {
            $this->dsn = "mysql:host=localhost;dbname=productosphpdb";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            $this::$connection = new PDO($this->dsn, "root", "211772809", $options);
        } catch (PDOException $th) {
            echo $th;
        }
    }

    public function getConnection(){
        return $this::$connection;
    }

    public function closeConnection(){
        $this::$connection=null;
    }
}
