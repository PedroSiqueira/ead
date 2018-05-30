@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Nova Notícia</h1>
    <form action="{{ !empty($disciplina)? '/disciplina/salvar/' . $disciplina->id : '/disciplina/criar' }}" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-group">
            <label>Nome</label>
            <input name="nome" class="form-control" value="{{ !empty($disciplina)? $disciplina->nome : '' }}"/>
        </div>
        <div class="form-group">
            <label >Descrição</label>
            <textarea name="descricao" class="form-control" rows="3">{{ !empty($disciplina)? $disciplina->descricao : ''}}</textarea>
        </div>
        <div class="form-group">
            <label>Início</label>
            <input name="inicio" class="form-control" type="date" value="{{ !empty($disciplina)? $disciplina->inicio : '' }}">
        </div>
        <div class="form-group">
            <label>Término</label>
            <input name="termino" class="form-control" type="date" value="{{ !empty($disciplina)? $disciplina->termino : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ !empty($disciplina)? 'Salvar' : 'Criar' }}</button>
    </form>
</div>
@endsection