<?php

namespace App\ThirdParty;

class Medoo
{
    protected $_connect;

    public function __construct()
    {        
        try {
            $config = config('database.connections.mysql');
            $this->_connect = new \Medoo\Medoo([
                'type' => 'mysql',
                'host' => $config['host'],
                'database' => $config['database'],
                'username' => $config['username'],
                'password' => $config['password'],
                'charset' => $config['charset'],
                'collation' => $config['collation'],
                'port' => $config['port'],
            ]);
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function __destruct()
    {
        $this->_connect->pdo = null;
    }
}
