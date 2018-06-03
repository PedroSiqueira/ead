<?php

namespace App;

/**
 * ao inserir um registro na tabela associativa DisciplinaUser, a associação entre uma disciplina e um usuário pode ser de "professor", "aluno inscrito mas não matriculado" e "aluno inscrito e matriculado". as outras opções são: quando o usuário não estiver autenticado, não será realizada a busca na tabela (NAO_AUTENTICADO); quando o usuário estiver autenticado mas não tiver associação com a disciplina (NAO_INSCRITO)
 */
abstract class Tipo {

    const PROFESSOR = 4;
    const ALUNO_INSCRITO = 2;
    const ALUNO_MATRICULADO = 3;
    const NAO_AUTENTICADO = 1;
    const NAO_INSCRITO = 0;

}
