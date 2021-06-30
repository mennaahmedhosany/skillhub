<?php

namespace Database\Seeders;

use Whoops\Run;
use App\Models\Cat;
use App\Models\User;
use Hamcrest\Core\Set;
use App\Models\Settings;
use Database\Seeders\CatSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { $this->call([
        RoleSeeder::class,
        UserSeeder::class,
        SettingsSeeder::class,
        CatSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
