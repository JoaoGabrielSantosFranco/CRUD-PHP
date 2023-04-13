<?php
namespace App\Db;

use \PDO;
use \PDOException;


class Database
{
    const HOST = 'localhost';

    const NAME = 'crud_vagas';

    const USER = 'root';

    const PASS = '';

    private $table;

    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }


    public function insert($values)
    {
        //datos da QUERY    
        $fiels = array_keys($values);
        $binds = array_pad([], count($fiels), '?');



        //monta a query
        $query = 'INSERT INTO ' . $this->table . '(' . implode(',', $fiels) . ') VALUES  (' . implode(',', $binds) . ')';


        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();

    }
}