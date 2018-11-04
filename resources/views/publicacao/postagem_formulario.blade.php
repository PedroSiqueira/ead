@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ !empty($publicacao)? 'Editar Postagem' : 'Criar Postagem' }}</h1>
    <form action="{{ !empty($publicacao)? '/postagem/salvar/' . $publicacao->id : '/postagem/criar' }}" method="post" enctype="multipart/form-data">
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
        <button type="submit" class="btn btn-primary">{{ !empty($publicacao)? 'Salvar' : 'Criar' }}</button>
    </form>
</div>
@endsection