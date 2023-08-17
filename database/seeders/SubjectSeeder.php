<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = [
            [ 
            'subject_name' => 'Math',
            ],
            [ 
            'subject_name' => 'Science'
            ],
            [ 
            'subject_name' => 'English',
            ],
            [ 
            'subject_name' => 'Filipino',
            ],
            [ 
            'subject_name' => 'ESP',
            ],
            [ 
            'subject_name' => 'MSEP',
            ],
            [ 
            'subject_name' => 'ARAL-PAN',
            ],
            [ 
            'subject_name' => 'EPP',
            ],
            [ 
            'subject_name' => 'MAPEH',
            ],
        ];

        Subject::insert($subject);
    }
}
