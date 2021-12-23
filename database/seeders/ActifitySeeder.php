<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActifitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actifities')->insert([
            'actifity_name' => 'jalan',
            'place' => 'bekasi',
            'date' => '2020-11-23'
        ]);
    }
}
