<?php

namespace App\Models;

class Model
{
    private $config;
    protected $pdo;
    protected $medoo;

    public function __construct()
    {
        $this->config = config('database.connections.mysql');
        $this->pdoInit();
        $this->medooInit();
    }

    public function __destruct()
    {
        $this->pdoDestroy();
        $this->medooDestroy();
    }

    public function pdoInit()
    {
        $config = $this->config;

        try {
            $this->pdo = new \PDO("mysql:host={$config['host']};port={$config['port']};dbname={$config['database']};charset={$config['charset']}", $config['username'], $config['password']);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function pdoDestroy()
    {
        $this->pdo = null;
    }

    public function medooInit()
    {
        $config = $this->config;

        try {
            $this->medoo = new \Medoo\Medoo([
                'type' => 'mysql',
                'host' => $config['host'],
                'database' => $config['database'],
                'username' => $config['username'],
                'password' => $config['password'],
                'charset' => $config['charset'],
                'collation' => $config['collation'],
                'port' => $config['port'],
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function medooDestroy()
    {
        $this->medoo->pdo = null;
    }
}
