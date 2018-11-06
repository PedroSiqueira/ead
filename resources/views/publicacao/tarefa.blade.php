@extends('disciplina.disciplina_conteudo')
@section('publicacao_conteudo')

<div class="card mb-3">
    <div class="card-header">
        <h5 class="card-title"><i class="far fa-edit"></i> {{ $publicacao->titulo }}</h5>
    </div>
    <div class="card-body">
        <div class='markdown_content'>{{$tarefa->descricao}}</div>
    </div>
    <div class="card-body">
        <div class="row" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
            <div class="col" style="border-left: 1px solid rgba(0, 0, 0, 0.125); border-right: 1px solid rgba(0, 0, 0, 0.125);">Início: {{ date("d/m/Y", strtotime($publicacao->tarefa->inicio)) }}</div>
            <div class="col" style="border-right: 1px solid rgba(0, 0, 0, 0.125);">Término: {{ date("d/m/Y", strtotime($publicacao->tarefa->termino)) }}</div>
            @if($tarefa->anexo)
            <div class="col" style="border-right: 1px solid rgba(0, 0, 0, 0.125);">
                <a href="{{ Storage::url($tarefa->anexo) }}" class="btn btn-primary">Baixar Anexo</a>
            </div>
            @endif
            @if(Auth::check() && $tipo == \App\Tipo::ALUNO_MATRICULADO)
            @if($entrega)
            <div class="col" style="border-right: 1px solid rgba(0, 0, 0, 0.125);">
                <a href="{{ Storage::url($entrega->anexo) }}" class="btn btn-primary">Baixar Tarefa Entregue</a>
            </div>
            @endif
            <!-- Button trigger modal -->
            <div class="col" style="border-right: 1px solid rgba(0, 0, 0, 0.125);">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#entregarTarefaModal">
                    @if($entrega) Substituir Tarefa
                    @else Entregar Tarefa
                    @endif
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

@if(Auth::check() && $tipo == \App\Tipo::ALUNO_MATRICULADO)
<!-- Modal -->
<div class="modal fade" id="entregarTarefaModal" tabindex="-1" role="dialog" aria-labelledby="entregarTarefaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="entregarTarefaModalLabel">Entrega da Tarefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/tarefa/entregar" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <input type="hidden" name="tarefa_id" value="{{ $tarefa->id }}" />
                <input type="hidden" name="disciplina_id" value="{{ $disciplina->id }}" />
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="msg_para_professor" class="col-3 col-form-label">Mensagem para o professor</label>
                        <input id="msg_para_professor" name="mensagem" class="form-control col-9"/>
                    </div>
                    <div class="form-group">
                        <label for="upload_tarefa">Adicione aqui teu arquivo</label>
                        <input id="upload_tarefa" type="file" name="anexo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Entregar Tarefa</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@if(Auth::check() && $tipo == \App\Tipo::PROFESSOR)
<div class="card mb-3">
    <div class="card-header">
        <h5 class="card-title">Tarefas Entregues</h5>
    </div>
    @if($tarefa->users)
    <ul class="list-group list-group-flush">
        <li class="list-group-item">todofazer</li>
        <li class="list-group-item">parei aqui</li>
        <li class="list-group-item">listar tarefas entregues</li>
        <li class="list-group-item">como a pessoa consegue ver a mensagem que deixou quando entregua a tarefa?</li>
    </ul>
    @endif
</div>
@endif

@endsection
