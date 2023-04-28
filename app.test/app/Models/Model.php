<?php

namespace App\Models;

class Model
{
    protected $_connect;

    public function __construct()
    {
        try {
            $config = config('database.connections.mysql');
            $this->_connect = new \PDO("mysql:host={$config['host']};port={$config['port']};dbname={$config['database']};charset={$config['charset']}", $config['username'], $config['password']);
            $this->_connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function __destruct()
    {
        $this->_connect = null;
    }
}
