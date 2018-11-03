@extends('disciplina.disciplina')
@section('disciplina_conteudo')
@if(Auth::check() && Auth::user()->professorDaDisciplina($disciplina->id) && $disciplina->novasInscricoes())
<div class="alert alert-info">
    Novos inscritos! Acesse o menu <a href="/disciplina/participantes/{{$disciplina->id}}">Participantes</a> para aceitá-los.
</div>
@endif
<h3>{!!html_entity_decode($disciplina->descricao)!!}</h3>
@if(Auth::guest())
<div class="alert alert-warning">Você precisa se <a href="/login">autenticar</a> e estar matriculado para acessar o conteúdo da disciplina...</div>
@elseif($tipo==\App\Tipo::ALUNO_INSCRITO)
<div class="alert alert-warning">Inscrição realizada com sucesso! Aguarde o professor aceitar tua matrícula...</div>
@elseif($tipo==\App\Tipo::NAO_INSCRITO)
<a href="/disciplina/matricular/{{ $disciplina->id }}" class="btn btn-primary">Matricular na Disciplina</a>
@elseif($tipo==\App\Tipo::ALUNO_MATRICULADO || $tipo==\App\Tipo::PROFESSOR)
<div class="card-columns">
    @foreach($publicacoes as $pub)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $pub->titulo }}</h5>
            <p class="card-text"><small class="text-muted">{{ strftime('%d/%m/%Y', time($pub->created_at)) }}</small></p>
        </div>
    </div>
    @endforeach
</div>
@endif

@if($tipo==\App\Tipo::PROFESSOR)
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#novaPublicacaoModal">
    Criar Publicação
</button>

<!-- Modal -->
<div class="modal fade" id="novaPublicacaoModal" tabindex="-1" role="dialog" aria-labelledby="novaPublicacaoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="/secao/novo/{{ $disciplina->id }}" class="btn btn-primary">Nova Seção</a>
                <a href="/publicacao/novo/{{ $disciplina->id }}" class="btn btn-primary">Nova Publicação</a>
                <a href="/tarefa/novo/{{ $disciplina->id }}" class="btn btn-primary">Nova Tarefa</a>
            </div>
        </div>
    </div>
</div>
@endif

@endsection