<?php

namespace App\Models;

class Users extends Model
{
    public function countAll(): int
    {
        $conn = $this->pdo;

        $stmt = $conn->query('SELECT COUNT(*) FROM `users`');

        return $stmt->fetchColumn();
    }

    public function findAll(): array
    {
        $conn = $this->pdo;

        $stmt = $conn->query('SELECT * FROM `users`');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_NUM);
    }

    public function findUserById(int $id): array|bool
    {
        $conn = $this->pdo;

        $stmt = $conn->prepare('SELECT * FROM `users` WHERE `id`=:id');
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function findUserByUuid(string $uuid): array|bool
    {
        $conn = $this->pdo;

        $stmt = $conn->prepare('SELECT * FROM `users` WHERE `uuid`=UUID_TO_BIN(:uuid)');
        $stmt->bindValue(':uuid', $uuid, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function findUserByUsername(string $username): array|bool
    {
        $conn = $this->pdo;

        $stmt = $conn->prepare('SELECT * FROM `users` WHERE `username`=:username');
        $stmt->bindValue(':username', $username, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function findUserByEmail(string $email): array|bool
    {
        $conn = $this->pdo;

        $stmt = $conn->prepare('SELECT * FROM `users` WHERE `email`=:email');
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addUser(array $params): void
    {
        $this->insertRow('users', $params);
    }

    public function updateUserById(array $params, int $id): void
    {
        $this->updateRow('users', $params, 'WHERE `id`=:id');
    }

    public function updateEmailById(string $email, int $id): void
    {
        $conn = $this->pdo;
        $conn->beginTransaction();

        try {
            $stmt = $conn->prepare('UPDATE `users` SET `email`=:email WHERE `id`=:id');

            $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }

    public function updatePasswordById(string $password, int $id): void
    {
        $conn = $this->pdo;
        $conn->beginTransaction();

        try {
            $stmt = $conn->prepare('UPDATE `users` SET `password`=:password WHERE `id`=:id');

            $stmt->bindValue(':password', $password, \PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }

    public function updateWelcomedById(string $welcomed, int $id): void
    {
        $conn = $this->pdo;
        $conn->beginTransaction();

        try {
            $stmt = $conn->prepare('UPDATE `users` SET `welcomed`=:welcomed WHERE `id`=:id');

            $stmt->bindValue(':welcomed', $welcomed, \PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, \PDO::PARAM_STR);
            $stmt->execute();

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }
}
