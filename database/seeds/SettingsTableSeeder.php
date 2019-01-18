<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([

            'site_name' => "Larabel's Blog",
            'address' => 'Kazakshtan, Almaty',
            'contact_number' => '87013175474',
            'contact_email' => 'info@laravel_blog.com',
        ]);
    }
}
