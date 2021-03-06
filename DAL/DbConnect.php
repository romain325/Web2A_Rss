<?php

namespace Web2A\DAL;

use Exception;
use PDO;
use Web2A\Config\Verification;

class DbConnect extends PDO {

    private $stmt;

    public function __construct(string $dsn, string $username, string $password) {
        if(Verification::verifDbConnect($dsn,$username,$password)){
            parent::__construct($dsn,$username,$password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }else{
            throw new Exception("The given informations are false");
        }

    }


    /** * @param string $query
     * @param array $parameters *
     * @return bool Returns `true` on success, `false` otherwise
     */

    public function executeQuery(string $query, array $parameters = []) : bool{
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }

        return $this->stmt->execute();
    }

    public function getResults() : array {
        return $this->stmt->fetchall();

    }
}

