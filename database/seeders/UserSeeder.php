<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);

        User::create([
            'name'=> 'Jorge Luis Condori Chavez',
            'email' => 'jorgel@gmail.com',
            'password' => bcrypt('1234Hola')
        ])->assignRole('admin');

        // User::factory(100)->create();
    }
}
