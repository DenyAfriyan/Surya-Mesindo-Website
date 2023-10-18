<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->truncate();

        $abouts = [
            ['title' => 'Rubber Manufacturing Machinery Provider In Indonesia',
            'description' => 'For over three decades, we have delivered various of rubber processing machineries to reputable manufacturers across Indonesia. With our excellent commitment to support greater process efficiency and labour productivity, we offer a broad range of rubber processing machines, accessories, and original spare parts to meet the needs of manufacturers across industry.'
        ]
        ];
        foreach ($abouts as $about){
            About::create($about);
        }
    }
}
