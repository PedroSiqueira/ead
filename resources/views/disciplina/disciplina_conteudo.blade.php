@extends('disciplina.disciplina')
@section('disciplina_conteudo')

@if(Auth::check() && Auth::user()->professorDaDisciplina($disciplina->id) && $disciplina->novasInscricoes())
<div class="alert alert-info">
    Novos inscritos! Acesse o menu <a href="/disciplina/participantes/{{$disciplina->id}}">Participantes</a> para aceitá-los.
</div>
@endif
<div class='markdown_content'>{{$disciplina->descricao}}</div>
@if(Auth::guest())
<div class="alert alert-warning">Você precisa se <a href="/login">autenticar</a> e estar matriculado para acessar o conteúdo da disciplina...</div>
@elseif($tipo==\App\Tipo::ALUNO_INSCRITO)
<div class="alert alert-warning">Inscrição realizada com sucesso! Aguarde o professor aceitar tua matrícula...</div>
@elseif($tipo==\App\Tipo::NAO_INSCRITO)
<a href="/disciplina/matricular/{{ $disciplina->id }}" class="btn btn-primary">Matricular na Disciplina</a>
@elseif($tipo==\App\Tipo::ALUNO_MATRICULADO || $tipo==\App\Tipo::PROFESSOR)
@yield('publicacao_conteudo')
@endif

@endsection


@section('publicacao_script')
<script src="{{ asset('js/marked.min.js') }}"></script>
<script type="text/javascript">
window.onload = function () {
    var markdowns = document.getElementsByClassName('markdown_content');
    for (let i = 0; i < markdowns.length; i++) {
        markdowns[i].innerHTML = marked(markdowns[i].innerHTML);
    }
};
</script>
@endsection
