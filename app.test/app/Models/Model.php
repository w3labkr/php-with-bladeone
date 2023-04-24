<?php

namespace App\Models;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->connection();
    }
    
    public function connection() {
        $config = config('database.connections.mysql');

        $this->db = new \Medoo\Medoo([
            'type' => 'mysql',
            'host' => $config['host'],
            'database' => $config['database'],
            'username' => $config['username'],
            'password' => $config['password'],
            'charset' => $config['charset'],
            'collation' => $config['collation'],
            'port' => $config['port'],
        ]);
    }
}
