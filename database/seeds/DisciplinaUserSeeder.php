<?php

use Illuminate\Database\Seeder;

class DisciplinaUserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('disciplina_user')->insert([
            'id' => 1,
            'disciplina_id' => 1,
            'user_id' => 1,
        ]);
    }

}
