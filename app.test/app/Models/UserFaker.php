<?php

namespace App\Models;

class UserFaker extends Model
{

    public function test()
    {
        $faker = \Faker\Factory::create(config('app.faker_locale'));
        $str = substr(str_replace('-', '', $faker->uuid()), 1, 20);

        var_dump($str);
    }

    public function createTable(): UserFaker
    {
        $this->_connect->exec(file_get_contents(SQL_PATH . '/createUserTable.sql'));

        echo "Created User Table.\n";

        return $this;
    }

    public function dropTable(): UserFaker
    {
        $this->_connect->exec(file_get_contents(SQL_PATH . '/dropUserTable.sql'));

        echo "Dropped User Table.\n";

        return $this;
    }

    public function factory(int $num = 10): UserFaker
    {
        $factory = new \Database\Factories\UserFactory();
        $user = new \App\Models\User();

        for ($i = 0; $i < $num; $i++) {
            try {
                $user->addUser($factory->definition());
            } catch (\Exception $e) {
                echo $e->getMessage();
                continue;
            }
        }

        echo "Inserted $num Users.\n";

        return $this;
    }
}
