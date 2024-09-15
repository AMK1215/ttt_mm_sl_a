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
                //'payload' => json_encode(0.00),
                'payload' => 0.00,  // Store as a float, not JSON

            ],

        ];

        foreach ($settings as $setting) {
            DB::table('settings')->insert($setting);
        }
    }
}
