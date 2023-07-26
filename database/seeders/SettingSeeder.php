<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'Name' => 'Flex compliance',
            'address' => 'P O BOX 1234, DAR ES SALAAM',
            'email' => 'company@email.com',
            'image' => 'company',
        ]);
    }
}
