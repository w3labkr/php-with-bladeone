<?php

namespace Database\Factories;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verification_token' => bin2hex(random_bytes(16)),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'reset_password_code' => rand(100000, 999999),
            'remember_token' => bin2hex(random_bytes(16)),
            'last_login' => date('Y-m-d H:i:s'),
            'level' => 0,
            'is_admin' => 0,
            'welcomed' => 0,
        ];
    }

    public function unverified(): array
    {
        return [
            'email_verified_at' => null,
        ];
    }
}
