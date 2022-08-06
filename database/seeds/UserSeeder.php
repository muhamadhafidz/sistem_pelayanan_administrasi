<?php

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
        DB::table('users')->insertGetId([
            'nama' => Str::random(10),
            'nik' => Str::random(10),
            'no_tlp' => Str::random(10),
            'email' => Str::random(5).'@gmail.com',
            'password' => Hash::make('password'),
            'hak_akses' => 'user',
        ]);
    }
}
