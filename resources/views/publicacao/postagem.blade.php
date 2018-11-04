@extends('disciplina.disciplina_principal')
@section('publicacao_conteudo')

<div class="card">
    <div class="card-header">
        <h5 class="card-title"><i class="far fa-file"></i> {{ $publicacao->titulo }}</h5>
    </div>
    <div class="card-body">
        <div id='markdown_content'>{{$post->descricao}}</div>
        <p class="card-text"><small class="text-muted">{{ strftime('%d/%m/%Y', time($post->created_at)) }}</small></p>
    </div>
</div>

@if($post->anexo)
<a href="{{ Storage::url($post->anexo) }}">Baixar Anexo: {{basename($post->anexo)}}</a>
@endif
@endsection

@section('publicacao_script')
<script src="{{ asset('js/marked.min.js') }}"></script>
<script type="text/javascript">
window.onload = function () {
    document.getElementById('markdown_content').innerHTML = marked(document.getElementById('markdown_content').innerHTML);
};
</script>
@endsection
