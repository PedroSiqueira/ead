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
<form action="/tarefa/entregar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden" name="tarefa_id" value="{{ $tarefa->id }}" />
    <input type="hidden" name="disciplina_id" value="{{ $disciplina->id }}" />
    <div class="form-group">
        <label>Mensagem para o professor</label>
        <input name="mensagem" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="upload_tarefa">Adicione aqui teu arquivo</label>
        <input id="upload_tarefa" type="file" name="anexo">
    </div>
    <button type="submit" class="btn btn-primary">Entregar Tarefa</button>
</form>


todofazer parei aqui
professor ver os anexos dos alunos

@endif

@endsection
