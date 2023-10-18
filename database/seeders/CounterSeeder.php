<?php

namespace Database\Seeders;

use App\Models\Counter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('counters')->truncate();

        $counters = [
            [
                'title' => 'Years Experience',
                'icon' => 'certificate',
                'counter' => 30
            ],
            [
                'title' => 'Machine',
                'icon' => 'industry',
                'counter' => 135
            ],
            [
                'title' => 'Sparepart',
                'icon' => 'check-double',
                'counter' => 150
            ],
            [
                'title' => 'Client',
                'icon' => 'users',
                'counter' => 100
            ],
        ];

        foreach ($counters as $counter) {
            Counter::create($counter);
        }
    }
}
