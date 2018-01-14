<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'=>'admin@admin.hu',
            'name'=>'Adminisztrátor',
            'password' => bcrypt('admin')
        ]);
    }
}
