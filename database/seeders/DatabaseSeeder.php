<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Rule;
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
        User::factory(10)->create();
        $user = new User();
        $user->name = 'admin';
        $user->email = 'a@a';
        $user->password = bcrypt('password');
        $user->save();

        Category::factory(4)->create();
        Rule::factory(50)->create();
    }
}
