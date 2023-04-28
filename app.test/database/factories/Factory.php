<?php

namespace Database\Factories;

class Factory
{
    protected $faker;

    public function __construct(int $seed = null)
    {
        $this->faker = \Faker\Factory::create(config('app.faker_locale'));
        $seed ?? $this->faker->seed($seed);
    }
}
