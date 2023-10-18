<?php

namespace Database\Seeders;

use App\Models\Machine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('machines')->truncate();
        $machines = [];

        $data = $this->getData('/mamba/img/product/machine');
        foreach($data as $row){
            array_push($machines,$row);
        }

        foreach($machines as $row){
            $name = $row['image']; 
            $name = explode('/', $name);
            $name = explode('.',end($name));
            $store['title'] = $name[count($name)-2];
            $machine = Machine::create($store);
            $machine->addMedia(public_path($row['image']))->toMediaCollection('image');
        }

        
    }
    public function getData($path){
        $files = array_filter(Storage::disk('assets')->files($path), function ($item) {
            $data = strpos($item, '.png') != '' ? strpos($item, '.png') : (strpos($item, '.jpg') == '' ? strpos($item, '.jpeg') : strpos($item, '.jpg'));
            return $data;
        });
        $arr = [];
        if ($files){
            foreach ($files as $row){
                array_push($arr,['image' => $row]);
            }
        } 
        return $arr;
    }
}
