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
                'group' => 'general',
                'name' => 'site_name',
                'locked' => false,
                'payload' => json_encode(['value' => 'My Application']),
            ],
            [
                'group' => 'general',
                'name' => 'site_url',
                'locked' => false,
                'payload' => json_encode(['value' => 'https://myapp.com']),
            ],
            [
                'group' => 'general',
                'name' => 'admin_email',
                'locked' => true,
                'payload' => json_encode(['value' => 'admin@myapp.com']),
            ],
            [
                'group' => 'security',
                'name' => 'enable_2fa',
                'locked' => false,
                'payload' => json_encode(['enabled' => true]),
            ],
            [
                'group' => 'features',
                'name' => 'new_feature_flag',
                'locked' => false,
                'payload' => json_encode(['enabled' => false]),
            ],
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->insert($setting);
        }
    }
}