<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->truncate();

        $sliders = [
            ['title' => '30 Years of Excellent History',
            'description' => 'Providing Advanced Rubber Machineries'
        ],
            ['title' => '30 Years of Excellent History',
            'description' => "Indonesia's Largest 
            Rubber Machine Suppliers",

        ],
        ];
        $image = ['mamba/img/slide/bg1.png','mamba/img/slide/bg2.png'];
        foreach ($sliders as $key => $slider){
            $addSlider = Slider::create($slider);
            $addSlider->addMedia(public_path($image[$key]))->toMediaCollection('image');
        }
    }
}
