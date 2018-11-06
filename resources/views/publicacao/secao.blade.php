@extends('disciplina.disciplina_conteudo')
@section('publicacao_conteudo')
<div class="card-columns">
    @foreach($publicacoes as $pub)
    <a href="/disciplina/ler/{{$disciplina->id}}/{{$pub->id}}" class="custom-card">
        <div class="card">
            @if($pub->tipo==\App\TipoPublicacao::SECAO)
            <div class="card-header">
                <h5 class="card-title"><i class="far fa-folder-open"></i> {{ $pub->titulo }}</h5>
            </div>
            @elseif($pub->tipo==\App\TipoPublicacao::POSTAGEM)
            <div class="card-body bg-light">
                <h5 class="card-title"><i class="far fa-file"></i> {{ $pub->titulo }}</h5>
                <p class="card-text"><small class="text-muted">Postagem: {{ strftime('%d/%m/%Y', time($pub->created_at)) }}</small></p>
            </div>
            @elseif($pub->tipo==\App\TipoPublicacao::TAREFA)
            <div class="card-body">
                <h5 class="card-title"><i class="far fa-edit"></i> {{ $pub->titulo }}</h5>
                <p class="card-text"><small class="text-muted">Início: {{ date("d/m/Y", strtotime($pub->tarefa->inicio)) }}. Término: {{ date("d/m/Y", strtotime($pub->tarefa->termino)) }}</small></p>
            </div>
            @endif
        </div>
    </a>
    @endforeach
</div>

@if($tipo==\App\Tipo::PROFESSOR)
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#novaPublicacaoModal">
    Criar Novo...
</button>

<!-- Modal -->
<div class="modal fade" id="novaPublicacaoModal" tabindex="-1" role="dialog" aria-labelledby="novaPublicacaoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="/secao/novo/{{ $disciplina->id }}{{ !empty($publicacao)? '/'.$publicacao->id : ''}}" class="btn btn-primary">Nova Seção</a>
                <a href="/postagem/novo/{{ $disciplina->id }}{{ !empty($publicacao)? '/'.$publicacao->id : ''}}" class="btn btn-primary">Nova Postagem</a>
                <a href="/tarefa/novo/{{ $disciplina->id }}{{ !empty($publicacao)? '/'.$publicacao->id : ''}}" class="btn btn-primary">Nova Tarefa</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection