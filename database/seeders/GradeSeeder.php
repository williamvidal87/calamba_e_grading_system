<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grade = [
            [ 
            'grade_name' => 'Grade 1',
            ],
            [ 
            'grade_name' => 'Grade 2',
            ],
            [ 
            'grade_name' => 'Grade 3',
            ],
            [ 
            'grade_name' => 'Grade 4',
            ],
            [ 
            'grade_name' => 'Grade 5',
            ],
            [ 
            'grade_name' => 'Grade 6',
            ],
        ];

        Grade::insert($grade);
    }
}
