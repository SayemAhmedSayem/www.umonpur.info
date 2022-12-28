<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
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
            'name' => 'এইমাত্র পাওয়া খাবর',
            'descriptions' => 'গত শনিবার দুপুরে সরেজমিনে দেখা',
            'user_id' => '1',

        ),
        array('id' => '2',
        'name' => 'সকল নোটিশ',
        'descriptions' => 'গত শনিবার দুপুরে সরেজমিনে দেখা',
        'user_id' => '1',

    ),

        array('id' => '3',
        'name' => 'সকল ইভেন্ট',
        'descriptions' => 'গত শনিবার দুপুরে সরেজমিনে দেখা',
        'user_id' => '1',

        ),

        array('id' => '4',
        'name' => 'আমাদের গ্রাম',
        'descriptions' => 'গত শনিবার দুপুরে সরেজমিনে দেখা',
        'user_id' => '1',

        ),



        array('id' => '5',
        'name' => 'আমাদের স্কুল',
        'descriptions' => 'গত শনিবার দুপুরে সরেজমিনে দেখা',
        'user_id' => '1',

        ),

        array('id' => '6',
        'name' => 'আমাদের মাদ্রাসা',
        'descriptions' => 'গত শনিবার দুপুরে সরেজমিনে দেখা',
        'user_id' => '1',

        ),

        array('id' => '7',
        'name' => 'আমাদের খেলাধুলা',
        'descriptions' => 'গত শনিবার দুপুরে সরেজমিনে দেখা',
        'user_id' => '1',

        ),

        array('id' => '8',
        'name' => 'আমাদের স্বাস্থ্য কপ্লেক্স',
        'descriptions' => 'গত শনিবার দুপুরে সরেজমিনে দেখা',
        'user_id' => '1',

        ),

           
           
        );
        DB::table('categories')->insert($reaction);
    }
}
