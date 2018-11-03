@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ !empty($publicacao)? 'Editar Seção' : 'Criar Seção' }}</h1>
    <form action="{{ !empty($publicacao)? '/secao/salvar/' . $publicacao->id : '/secao/criar' }}" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-group">
            <label>Nome</label>
            <input name="nome" class="form-control" value="{{ !empty($publicacao)? $publicacao->nome : '' }}"/>
        </div>
        <button type="submit" class="btn btn-primary">{{ !empty($publicacao)? 'Salvar' : 'Criar' }}</button>
    </form>
</div>
@endsection