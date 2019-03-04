<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder {

    public function run() {
        \App\Setting::create([
            'site_name' => "Hikmet's Blog",
            'contact_number' => '0500 500 00 00',
            'contact_mail' => 'info@blog.com',
            'address' => 'Ankara, Turkey'
        ]);
    }
}
