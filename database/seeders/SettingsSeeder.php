<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
          'email'=>'ahmad@gamil.com' ,
          'phone'=>'123',
          'twetter'=>'twetter',
          'instegram'=>'instegram',
          'youtube'=>'youtube',
          'linkedin'=>'linkedin',
        ]);

        //
    }
}
