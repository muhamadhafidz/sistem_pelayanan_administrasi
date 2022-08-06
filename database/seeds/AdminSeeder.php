<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insertGetId([
            'nama' => 'anonim',
            'nik' => '-',
            'no_tlp' => '-',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'hak_akses' => 'admin',
        ]);
    }
}
