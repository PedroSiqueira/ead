@extends('disciplina.disciplina_conteudo')
@section('publicacao_conteudo')

<div class="card mb-3">
    <div class="card-header">
        <h5 class="card-title"><i class="far fa-edit"></i> {{ $publicacao->titulo }}</h5>
    </div>
    <div class="card-body">
        <div class='markdown_content'>{{$tarefa->descricao}}</div>
    </div>
    <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
        <div class="row" >
            <div class="col" style="border-left: 1px solid rgba(0, 0, 0, 0.125); border-right: 1px solid rgba(0, 0, 0, 0.125);">Início: {{ date("d/m/Y", strtotime($publicacao->tarefa->inicio)) }}</div>
            <div class="col" style="border-right: 1px solid rgba(0, 0, 0, 0.125);">Término: {{ date("d/m/Y", strtotime($publicacao->tarefa->termino)) }}</div>
            @if($tarefa->anexo)
            <div class="col" style="border-right: 1px solid rgba(0, 0, 0, 0.125);">
                <a href="{{ Storage::url($tarefa->anexo) }}" class="btn btn-primary">Baixar Anexo</a>
            </div>
            @endif
        </div>
    </div>
    @if(Auth::check() && $tipo == \App\Tipo::ALUNO_MATRICULADO)
    <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
        <form action="/tarefa/entregar" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="tarefa_id" value="{{ $tarefa->id }}" />
            <input type="hidden" name="disciplina_id" value="{{ $disciplina->id }}" />
            <div class="form-group form-inline">
                <label for="msg_para_professor" style="padding-right:10px;">Mensagem para o professor</label>
                <input id="msg_para_professor" class="form-control" name="mensagem" value="{{ $entrega? $entrega->mensagem : '' }}"/>
            </div>
            <div class="form-group form-inline">
                <label for="upload_tarefa" style="padding-right:10px;">Adicione aqui teu arquivo</label>
                <input id="upload_tarefa" type="file" name="anexo">
            </div>
            <button type="submit" class="btn btn-primary">
                @if($entrega) Substituir Tarefa
                @else Entregar Tarefa
                @endif
            </button>
            @if($entrega && $entrega->anexo)
            <a href="{{ Storage::url($entrega->anexo) }}" class="btn btn-primary">Baixar Tarefa Entregue</a>
            @endif
        </form>
        @if($entrega)
        @endif
    </div>
    @endif
</div>

@if(Auth::check() && $tipo == \App\Tipo::PROFESSOR)
<div class="card mb-3">
    <div class="card-header">
        <h5 class="card-title">Tarefas Entregues</h5>
    </div>
    @if($tarefa->users && $tarefa->users->count()>0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Mensagem</th>
                <th scope="col">Data de Entrega</th>
                <th scope="col">Anexo</th>
            </tr>
        </thead>
        @foreach($tarefa->users as $entrega)
        <tr>
            <td>{{$entrega->name}}</td>
            <td>{{$entrega->pivot->mensagem}}</td>
            <td>{{ date("d/m/Y", strtotime($entrega->pivot->updated_at)) }}</td>
            <td>
                @if($entrega->pivot->anexo)
                <a href="{{ Storage::url($entrega->pivot->anexo) }}" class="btn btn-primary">Baixar</a>
                @else
                --
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    @if($tarefa->users && $tarefa->users->count()>0)
    <div class="card-body">
        <a href="/tarefa/baixar/{{$disciplina->id}}/{{$tarefa->id}}" class="btn btn-primary">Baixar todos</a>
    </div>
    @endif
    @else
    Nenhuma ainda!
    @endif
</div>
@endif

@endsection
