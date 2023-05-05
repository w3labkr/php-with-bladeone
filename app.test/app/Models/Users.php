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
        $conn = $this->pdo;
        $conn->beginTransaction();

        $columns = implode(',', array_map(fn ($v) => '`'.$v.'`', array_keys($params)));
        $values = implode(',', array_map(fn ($v) => ':'.$v, array_keys($params)));

        try {
            $stmt = $conn->prepare("INSERT INTO `users` ({$columns}) VALUES ({$values})");

            foreach ($params as $key => $value) {
                switch ($key) {
                    case 'password':
                        $stmt->bindValue(':'.$key, password_hash($value, PASSWORD_DEFAULT));
                        continue 2;
                }
                $stmt->bindValue(':'.$key, $value);
            }

            $stmt->execute();
            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }

    public function updateUserById(array $params, int $id): void
    {
        $conn = $this->pdo;
        $conn->beginTransaction();

        $values = implode(',', array_map(fn ($v) => '`'.$v.'`=:'.$v, array_keys($params)));

        try {
            $stmt = $conn->prepare("UPDATE `users` SET {$values} WHERE `id`=:id");

            foreach ($params as $key => $value) {
                switch ($key) {
                    case 'password':
                        $stmt->bindValue(':'.$key, password_hash($value, PASSWORD_DEFAULT));
                        continue 2;
                }
                $stmt->bindValue(':'.$key, $value);
            }

            $stmt->execute();
            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }

    public function deleteUserById(int $id): void
    {
        $conn = $this->pdo;
        $conn->beginTransaction();

        try {
            $stmt = $conn->prepare('UPDATE `users` SET `deleted_at`=:deleted_at WHERE `id`=:id');

            $stmt->bindValue(':deleted_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }

    public function dropUserById(int $id): void
    {
        $conn = $this->pdo;
        $conn->beginTransaction();

        try {
            $stmt = $conn->prepare('DELETE FROM `users` WHERE `id`=:id');

            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }

    public function updateUsernameById(string $username, int $id): void
    {
        $conn = $this->pdo;
        $conn->beginTransaction();

        try {
            $stmt = $conn->prepare('UPDATE `users` SET `username`=:username WHERE `id`=:id');

            $stmt->bindValue(':username', $username, \PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }

    public function updateNicknameById(string $nickname, int $id): void
    {
        $conn = $this->pdo;
        $conn->beginTransaction();

        try {
            $stmt = $conn->prepare('UPDATE `users` SET `nickname`=:nickname WHERE `id`=:id');

            $stmt->bindValue(':nickname', $nickname, \PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
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

            $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), \PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }

    public function updateWelcomedById(int $welcomed, int $id): void
    {
        $conn = $this->pdo;
        $conn->beginTransaction();

        try {
            $stmt = $conn->prepare('UPDATE `users` SET `welcomed`=:welcomed WHERE `id`=:id');

            $stmt->bindValue(':welcomed', $welcomed, \PDO::PARAM_INT);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }
}
