<?php

namespace App\DAO;

use \PDO;

abstract class DAO {
    /**
     * Database connection as a PDO object
     * 
     * @var PDO
     */
    private $connection;

    /**
     * Initialize a new instance of DAO with the database connection as a PDO instance
     *
     * @param PDO $connection
     */
    public function __construct (PDO $connection) {
        $this->connection = $connection;
    }   

    /**
     * Returns the current database connection as a PDO instance
     *
     * @return PDO
     */
    protected function getConnection (): PDO {
        return $this->connection;
    }

    protected abstract function resolveRow (array $row);
}