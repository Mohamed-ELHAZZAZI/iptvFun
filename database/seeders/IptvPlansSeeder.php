<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IptvPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iptv_plans')->insert([
            [
                'price' => 19,
                'period' => '1 month',
                'type' => 'Intro',
                'slug' => '1-month-iptv-plan'
            ],
            [
                'price' => 39,
                'period' => '3 months',
                'type' => 'Base',
                'slug' => '3-months-iptv-plan'
            ],
            [
                'price' => 99,
                'period' => '1 year',
                'type' => 'Popular',
                'slug' => '1-year-iptv-plan'
            ]
        ]);
    }
}
