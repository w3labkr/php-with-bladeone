<?php

namespace App\Models;

class User extends Model
{
    public function getTotalUser(): int
    {
        $conn = $this->_connect;

        $stmt = $conn->query('SELECT COUNT(*) FROM user;');

        return $stmt->fetchColumn();
    }

    public function getUsers(): array
    {
        $conn = $this->_connect;

        $stmt = $conn->query('SELECT * FROM user;');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_NUM);
    }

    public function getUser(array $params = []): array
    {
        $conn = $this->_connect;

        $stmt = $conn->prepare('SELECT * FROM user WHERE email = :email;');
        $stmt->bindValue(':email', $params['email']);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addUser(array $params = []): void
    {
        $conn = $this->_connect;
        $conn->beginTransaction();

        try {
            $stmt = $conn->prepare('INSERT INTO user (name, email, email_verified_at, password, remember_token) VALUES(:name, :email, :email_verified_at, :password, :remember_token);');

            $stmt->bindValue(':name', $params['name'], \PDO::PARAM_STR);
            $stmt->bindValue(':email', $params['email'], \PDO::PARAM_STR);
            $stmt->bindValue(':email_verified_at', $params['email_verified_at'], \PDO::PARAM_STR);
            $stmt->bindValue(':password', $params['password'], \PDO::PARAM_STR);
            $stmt->bindValue(':remember_token', $params['remember_token'], \PDO::PARAM_STR);
            $stmt->execute();

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
        }
    }
}
