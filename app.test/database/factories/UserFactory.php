<?php

namespace Database\Factories;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => substr(str_replace('-', '', $this->faker->uuid()), 1, 20),
        ];
    }

    public function unverified()
    {
        return [
            'email_verified_at' => null,
        ];
    }
}
