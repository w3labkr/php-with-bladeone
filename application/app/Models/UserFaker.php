<?php

namespace App\Models;

use Database\Factories\UserFactory;

class UserFaker extends Users
{
    public function createTable(): UserFaker
    {
        $this->pdo->exec(file_get_contents(SQL_PATH.'/createUsersTable.sql'));

        session()->destroy();

        echo "Created User Table.\n";

        return $this;
    }

    public function dropTable(): UserFaker
    {
        $this->pdo->exec(file_get_contents(SQL_PATH.'/dropUsersTable.sql'));

        session()->destroy();

        echo "Dropped User Table.\n";

        return $this;
    }

    public function factory(int $num = 10): UserFaker
    {
        $factory = new UserFactory();

        for ($i = 0; $i < $num; ++$i) {
            $definition = array_merge($factory->definition(), $factory->unverified());
            $this->addUser($definition);
        }

        echo "Inserted $num Users.\n";

        return $this;
    }
}
