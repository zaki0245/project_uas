<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'nim' => '2031710106',
            'name' => 'Muhammad Zaki',
            'class' => 'MI-2F',
            'department' => 'JTI',
            'phone_number' => '085811252996',
        ]);
        DB::table('members')->insert([
            'nim' => '2031710032',
            'name' => 'M. Thosin Yuhaililul Hilmi',
            'class' => 'MI-2F',
            'department' => 'JTI',
            'phone_number' => '082334112406',
        ]);
    }
}
