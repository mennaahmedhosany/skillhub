<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name'=>'menna',
            'email'=>'menna@gamil.com',
            'password'=>Hash::make('123'),
            'role_id'=>1
        ]);
        //
    }
}
