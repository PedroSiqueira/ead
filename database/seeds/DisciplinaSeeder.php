<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DisciplinaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $dt = Carbon::now();

        DB::table('disciplinas')->insert([
            'id' => 1,
            'nome' => 'Disciplina 1',
            'descricao' => 'Descrição da <strong>disciplina</strong> de número 1',
            'inicio' => $dt->copy()->subMonth(2),
            'termino' => $dt->copy()->subMonth(1),
        ]);

        DB::table('disciplinas')->insert([
            'id' => 2,
            'nome' => 'Disciplina 2',
            'descricao' => 'Descrição da <strong>disciplina</strong> de número 2',
            'inicio' => $dt->copy()->subMonth(2),
            'termino' => $dt,
        ]);

        DB::table('disciplinas')->insert([
            'id' => 3,
            'nome' => 'Disciplina 3',
            'descricao' => 'Descrição da <strong>disciplina</strong> de número 3',
            'inicio' => $dt,
            'termino' => $dt,
        ]);

        DB::table('disciplinas')->insert([
            'id' => 4,
            'nome' => 'Disciplina 4',
            'descricao' => 'Descrição da <strong>disciplina</strong> de número 4',
            'inicio' => $dt,
            'termino' => $dt->copy()->addMonth(1),
        ]);

        DB::table('disciplinas')->insert([
            'id' => 5,
            'nome' => 'Disciplina 5',
            'descricao' => 'Descrição da <strong>disciplina</strong> de número 5',
            'inicio' => $dt->copy()->addMonth(1),
            'termino' => $dt->copy()->addMonth(2),
        ]);

        DB::table('disciplinas')->insert([
            'id' => 6,
            'nome' => 'Disciplina 6',
            'descricao' => 'Descrição da <strong>disciplina</strong> de número 6',
            'inicio' => $dt->copy()->addMonth(2),
            'termino' => $dt->copy()->addMonth(4),
        ]);

        DB::table('disciplinas')->insert([
            'id' => 7,
            'nome' => 'Disciplina 7',
            'descricao' => 'Descrição da <strong>disciplina</strong> de número 7',
            'inicio' => $dt->copy()->addMonth(4),
            'termino' => $dt->copy()->addMonth(4),
        ]);

        DB::table('disciplinas')->insert([
            'id' => 8,
            'nome' => 'Disciplina 8',
            'descricao' => 'Descrição da <strong>disciplina</strong> de número 8',
            'inicio' => $dt,
            'termino' => $dt->copy()->addMonth(4),
        ]);

        DB::table('disciplinas')->insert([
            'id' => 9,
            'nome' => 'Disciplina 9',
            'descricao' => 'Descrição da <strong>disciplina</strong> de número 9',
            'inicio' => $dt->copy()->addMonth(2),
            'termino' => $dt->copy()->addMonth(4),
        ]);
    }

}
