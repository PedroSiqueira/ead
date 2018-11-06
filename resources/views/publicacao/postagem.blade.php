@extends('disciplina.disciplina_conteudo')
@section('publicacao_conteudo')

<div class="card">
    <div class="card-header">
        <h5 class="card-title"><i class="far fa-file"></i> {{ $publicacao->titulo }}</h5>
    </div>
    <div class="card-body">
        <div class='markdown_content'>{{$post->descricao}}</div>
        <p class="card-text"><small class="text-muted">{{ date("d/m/Y", strtotime($post->created_at)) }}</small></p>
    </div>
</div>

@if($post->anexo)
<a href="{{ Storage::url($post->anexo) }}">Baixar Anexo: {{basename($post->anexo)}}</a>
@endif
@endsection
