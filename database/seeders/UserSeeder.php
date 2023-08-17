<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [ 
            'lrn'       => null,
            'name'      => 'Marnel Pacunla',
            'email'     => 'marnel@gmail.com',
            'password'  => bcrypt('marnel345'),
            'rule_id'   => 1,
            'sex_id'    => null,
            'birth_date'=> null,
            ],
            [ 
            'lrn'       => null,
            'name'      => 'Stephen Villacarlos',
            'email'     => 'stephen@gmail.com',
            'password'  => bcrypt('stephen123'),
            'rule_id'   => 2,
            'sex_id'    => null,
            'birth_date'=> null,
            ],
            [ 
            'lrn'       => 120122,
            'name'      => 'Gencelle Magtagad',
            'email'     => 'genlmagtagad@gmail.com',
            'password'  => bcrypt('agstnine000'),
            'rule_id'   => 3,
            'sex_id'    => 1,
            'birth_date'=> null,
            ],
        ];

        User::insert($user);
    }
}
