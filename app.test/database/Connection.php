<?php

namespace App\Databases;

class Connection
{
    private $config;
    protected $db;

    public function __construct()
    {
        $this->config = config('database.connections.mysql');
        $this->db();
    }

    public function db()
    {
        $config = $this->config;

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
