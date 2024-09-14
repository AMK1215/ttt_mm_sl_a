<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
             [
                'group' => 'provider',  // Example for your custom property
                'name' => 'provider_initial_balance',
                'locked' => false,
                'payload' => json_encode(['balance' => 0.00]),  // Add the missing value
            ],
            
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->insert($setting);
        }
    }
}