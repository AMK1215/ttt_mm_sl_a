<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'group' => 'app',  // Example for your custom property
                'name' => 'provider_initial_balance',
                'locked' => false,
                //'payload' => json_encode(['balance' => 1.00]),  // Add the missing value
                'payload' => json_encode(0.00),
            ],

        ];

        foreach ($settings as $setting) {
            DB::table('settings')->insert($setting);
        }
    }
}
