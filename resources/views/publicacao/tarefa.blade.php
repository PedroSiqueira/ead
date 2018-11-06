@extends('disciplina.disciplina_conteudo')
@section('publicacao_conteudo')

<div class="card">
    <div class="card-header">
        <h5 class="card-title"><i class="far fa-edit"></i> {{ $publicacao->titulo }}</h5>
    </div>
    <div class="card-body">
        <div class='markdown_content'>{{$tarefa->descricao}}</div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Início: {{ date("d/m/Y", strtotime($publicacao->tarefa->inicio)) }}</li>
            <li class="list-group-item">Término: {{ date("d/m/Y", strtotime($publicacao->tarefa->termino)) }}</li>
            <li class="list-group-item">
                @if($tarefa->anexo)
                <a href="{{ Storage::url($tarefa->anexo) }}" class="btn btn-primary">Baixar Anexo: {{basename($tarefa->anexo)}}</a>
                @endif
            </li>
        </ul>

    </div>
</div>

@if(Auth::check() && $tipo == \App\Tipo::ALUNO_MATRICULADO)
todofazer parei aqui
onde o aluno vai submeter o codigo
@endif

@endsection
