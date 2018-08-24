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

        DB::table('users')->insert([
            'id' => 7,
            'name' => 'Qrwe',
            'email' => 'qrwe@qrwe.qrwe',
            'password' => Hash::make('qrweqrwe'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 8,
            'name' => 'Qwre',
            'email' => 'qwre@qwre.qwre',
            'password' => Hash::make('qwreqwre'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 9,
            'name' => 'Qewr',
            'email' => 'qewr@qewr.qewr',
            'password' => Hash::make('qewrqewr'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 10,
            'name' => 'Qerw',
            'email' => 'qerw@qerw.qerw',
            'password' => Hash::make('qerwqerw'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 11,
            'name' => 'Qrew',
            'email' => 'qrew@qrew.qrew',
            'password' => Hash::make('qrewqrew'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 12,
            'name' => 'Reqw',
            'email' => 'reqw@reqw.reqw',
            'password' => Hash::make('reqwreqw'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 13,
            'name' => 'Rweq',
            'email' => 'rweq@rweq.rweq',
            'password' => Hash::make('rweqrweq'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 14,
            'name' => 'Rwqe',
            'email' => 'rwqe@rwqe.rwqe',
            'password' => Hash::make('rwqerwqe'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 15,
            'name' => 'Rqew',
            'email' => 'rqew@rqew.rqew',
            'password' => Hash::make('rqewrqew'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);

        DB::table('users')->insert([
            'id' => 16,
            'name' => 'Rqwe',
            'email' => 'rqwe@rqwe.rqwe',
            'password' => Hash::make('rqwerqwe'),
            'token' => str_random(31),
            'professor' => false,
            'verified' => true,
        ]);
    }

}
