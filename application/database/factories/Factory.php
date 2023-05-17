<?php

namespace Database\Factories;

class Factory
{
    protected $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create(config('app.faker_locale'));
        // $this->faker->seed(1234);
    }
}
