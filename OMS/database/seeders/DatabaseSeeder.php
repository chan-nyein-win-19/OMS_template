<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;
use App\Announcements;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Announcement::factory(10)->create();

        \App\Models\User::factory()->create([
            'fname'=>'a',
            'lname'=>'a',
            'username'=>'aa',
            'employeeid'=>'201',
            'email'=>'thawtar13799@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role'=>'Admin',
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Purchase::factory(5)->create();
    }
}
