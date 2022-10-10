<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Manuel Chunca Mamani',
            'email'=>'manuelchuncamamani@gmail.com',
            'password'=>bcrypt('12346578'),
        ]);

    User::factory(5)->create();
    }
}
