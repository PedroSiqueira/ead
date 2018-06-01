<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Asdf',
            'email' => 'asdf@asdf.asdf',
            'password' => Hash::make('asdfasdf'),
            'token' => str_random(31),
            'professor' => true,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Fdsa',
            'email' => 'fdsa@fdsa.fdsa',
            'password' => Hash::make('fdsafdsa'),
            'token' => str_random(31),
            'professor' => true,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Qwer',
            'email' => 'qwer@qwer.qwer',
            'password' => Hash::make('qwerqwer'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Rewq',
            'email' => 'rewq@rewq.rewq',
            'password' => Hash::make('rewqrewq'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 5,
            'name' => 'Zxcv',
            'email' => 'zxcv@zxcv.zxcv',
            'password' => Hash::make('zxcvzxcv'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 6,
            'name' => 'Vcxz',
            'email' => 'vcxz@vcxz.vcxz',
            'password' => Hash::make('vcxzvcxz'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);
    }

}
