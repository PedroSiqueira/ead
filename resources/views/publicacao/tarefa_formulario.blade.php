@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ !empty($publicacao)? 'Editar Tarefa' : 'Criar Tarefa' }}</h1>
    <form action="{{ !empty($publicacao)? '/tarefa/salvar/' . $publicacao->id : '/tarefa/criar' }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="disciplina_id" value="{{ $disciplina_id }}" />
        <input type="hidden" name="publicacao_id" value="{{ $publicacao_id }}" />
        <div class="form-group">
            <label>Nome</label>
            <input name="nome" class="form-control" value="{{ !empty($publicacao)? $publicacao->nome : '' }}"/>
        </div>
        <div class="form-group">
            <label >Descrição (Aceita a linguagem de marcação Markdown)</label>
            <textarea name="descricao" class="form-control" rows="3">{{ !empty($publicacao)? $publicacao->descricao : ''}}</textarea>
        </div>
        <div class="form-group">
            <label>Anexo</label>
            <input type="file" name="anexo">
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Início da Tarefa</label>
                <input name="inicio" class="form-control" type="date" value="{{ !empty($publicacao)? $publicacao->inicio : '' }}">
            </div>
            <div class="form-group">
                <label>Término da Tarefa</label>
                <input name="termino" class="form-control" type="date" value="{{ !empty($publicacao)? $publicacao->termino : '' }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ !empty($publicacao)? 'Salvar' : 'Criar' }}</button>
    </form>
</div>
@endsection