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
            'name'=>'Angel Rosendo Condori Coquira',
            'email'=>'angel.condori@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        User::factory(5)->create();
    }
}
