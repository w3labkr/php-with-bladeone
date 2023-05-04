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

    public function insertRow(string $table_name, array $params, ...$args): void
    {
        $conn = $this->pdo;
        $conn->beginTransaction();

        $columns = implode(',', array_map(fn ($v) => '`'.$v.'`', array_keys($params)));
        $values = implode(',', array_map(fn ($v) => ':'.$v, array_keys($params)));
        $etc = implode(' ', $args);
        $sql = "INSERT INTO `{$table_name}` ({$columns}) VALUES ({$values}) {$etc}";

        try {
            $stmt = $conn->prepare($sql);

            foreach ($params as $key => $value) {
                $stmt->bindValue(':'.$key, $params[$key]);
            }

            $stmt->execute();
            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }

    public function updateRow(string $table_name, array $params, ...$args): void
    {
        $conn = $this->pdo;
        $conn->beginTransaction();

        $values = implode(',', array_map(fn ($v) => '`'.$v.'`=:'.$v, array_keys($params)));
        $etc = implode(' ', $args);
        $sql = "UPDATE `{$table_name}` SET {$values} {$etc}";

        try {
            $stmt = $conn->prepare($sql);

            foreach ($params as $key => $value) {
                $stmt->bindValue(':'.$key, $params[$key]);
            }

            $stmt->execute();
            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }
}
