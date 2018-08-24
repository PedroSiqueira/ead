<?php

use Illuminate\Database\Seeder;

class DisciplinaUserSeeder extends Seeder {

    public function criarProfessores() {
        DB::table('disciplina_user')->insert([
            'id' => 1,
            'disciplina_id' => 1,
            'user_id' => 1,
            'tipo' => App\Tipo::PROFESSOR,
        ]);

        DB::table('disciplina_user')->insert([
            'id' => 2,
            'disciplina_id' => 2,
            'user_id' => 1,
            'tipo' => App\Tipo::PROFESSOR,
        ]);

        DB::table('disciplina_user')->insert([
            'id' => 3,
            'disciplina_id' => 3,
            'user_id' => 1,
            'tipo' => App\Tipo::PROFESSOR,
        ]);

        DB::table('disciplina_user')->insert([
            'id' => 4,
            'disciplina_id' => 4,
            'user_id' => 1,
            'tipo' => App\Tipo::PROFESSOR,
        ]);

        DB::table('disciplina_user')->insert([
            'id' => 5,
            'disciplina_id' => 5,
            'user_id' => 1,
            'tipo' => App\Tipo::PROFESSOR,
        ]);

        DB::table('disciplina_user')->insert([
            'id' => 6,
            'disciplina_id' => 6,
            'user_id' => 1,
            'tipo' => App\Tipo::PROFESSOR,
        ]);

        DB::table('disciplina_user')->insert([
            'id' => 7,
            'disciplina_id' => 7,
            'user_id' => 2,
            'tipo' => App\Tipo::PROFESSOR,
        ]);

        DB::table('disciplina_user')->insert([
            'id' => 8,
            'disciplina_id' => 8,
            'user_id' => 2,
            'tipo' => App\Tipo::PROFESSOR,
        ]);

        DB::table('disciplina_user')->insert([
            'id' => 9,
            'disciplina_id' => 9,
            'user_id' => 2,
            'tipo' => App\Tipo::PROFESSOR,
        ]);
    }

    public function criarInscritos() {
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 1,
            'user_id' => 3,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 3,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 3,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 4,
            'user_id' => 3,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 5,
            'user_id' => 3,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 6,
            'user_id' => 3,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 7,
            'user_id' => 3,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 8,
            'user_id' => 3,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 9,
            'user_id' => 3,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);


        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 5,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 6,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 7,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 8,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 9,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 10,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 11,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 12,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 13,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 14,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);

        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 2,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 4,
            'user_id' => 2,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 7,
            'user_id' => 1,
            'tipo' => App\Tipo::ALUNO_INSCRITO,
        ]);
    }

    public function criarMatriculados() {
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 1,
            'user_id' => 4,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 4,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 3,
            'user_id' => 4,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 4,
            'user_id' => 4,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 5,
            'user_id' => 4,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 6,
            'user_id' => 4,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 7,
            'user_id' => 4,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 8,
            'user_id' => 4,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 9,
            'user_id' => 4,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);


        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 5,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 6,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 7,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 8,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 9,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 10,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 11,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 12,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 13,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 14,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);

        DB::table('disciplina_user')->insert([
            'disciplina_id' => 2,
            'user_id' => 2,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 5,
            'user_id' => 2,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
        DB::table('disciplina_user')->insert([
            'disciplina_id' => 8,
            'user_id' => 1,
            'tipo' => App\Tipo::ALUNO_MATRICULADO,
        ]);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DisciplinaUserSeeder::criarProfessores();
        DisciplinaUserSeeder::criarInscritos();
        DisciplinaUserSeeder::criarMatriculados();
    }

}
