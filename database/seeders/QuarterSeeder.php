<?php

namespace Database\Seeders;

use App\Models\Quarter;
use Illuminate\Database\Seeder;

class QuarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quarter = [
            [ 
            'quarter_name' => '1st Quarter',
            ],
            [ 
            'quarter_name' => '2nd Quarter'
            ],
            [ 
            'quarter_name' => '3rd Quarter',
            ],
            [ 
            'quarter_name' => '4th Quarter',
            ],
        ];
        
        Quarter::insert($quarter);
    }
}
