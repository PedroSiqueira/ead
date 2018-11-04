@extends('disciplina.disciplina_principal')
@section('publicacao_conteudo')
<h5><pre>{{$post->descricao}}</pre></h5>
@if($post->anexo)
<a href="{{ Storage::url($post->anexo) }}">Download Anexo</a>
@endif
@endsection