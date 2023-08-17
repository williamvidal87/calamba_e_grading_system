<?php

namespace Database\Seeders;

use App\Models\Sex;
use Illuminate\Database\Seeder;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sex = [
            [ 
            'sex_name' => 'Male',
            ],
            [ 
            'sex_name' => 'Female'
            ],
        ];
        
        Sex::insert($sex);
    }
}
