<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition()
    {

        return [
            'fname' => $this->faker->name(),
            'lname' => $this->faker->name(),
            'username' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => $this->faker->name(),
            'employeeid' => rand(1,100),
            'remember_token' => Str::random(10),
        ];
    }
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [

                'fname' => $this->faker->name(),
    
                'lname' => $this->faker->name(),
    
                'username'=> $this->faker->name(),
    
              //  'employeeid'=>$this->faker->unique()->safeEmployeeid(),
    
                'email' => $this->faker->unique()->safeEmail(),
    
                'email_verified_at' => now(),
    
                'role'=>'admin',
    
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    
                'remember_token' => Str::random(10),
    
            ];
        });
    }
}
