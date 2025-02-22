<?php

namespace Database\Seeders;

use App\Models\Events;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->superAdmin()->create(); //superAdmin account, email: sAdmin@gmail.com, password: superAdmin123
        User::factory(50)->create();
        Events::factory(40)->create();
    }
}
