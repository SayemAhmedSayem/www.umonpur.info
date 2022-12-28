<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reaction = array(
            array('id' => '1',
            'name' => 'Sayem Ahmed',
            'email' => 'sayemahmed92@gmail.com',
            'password' => bcrypt('Sayemahmed92@#'),
            'status' => '1',
            'user_type' => 'user',

        ),

           
           
        );
        DB::table('users')->insert($reaction);
    }
}
