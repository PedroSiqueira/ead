@extends('disciplina.disciplina_conteudo')
@section('publicacao_conteudo')

<div class="card">
    <div class="card-header">
        <h5 class="card-title"><i class="far fa-file"></i> {{ $publicacao->titulo }}</h5>
    </div>
    <div class="card-body">
        <div class='markdown_content'>{{$tarefa->descricao}}</div>
        <p class="card-text"><small class="text-muted">Início: {{ date("d/m/Y", strtotime($publicacao->tarefa->inicio)) }}. Término: {{ date("d/m/Y", strtotime($publicacao->tarefa->termino)) }}</small></p>

    </div>
</div>

@if($tarefa->anexo)
<a href="{{ Storage::url($tarefa->anexo) }}">Baixar Anexo: {{basename($tarefa->anexo)}}</a>
@endif
@endsection
