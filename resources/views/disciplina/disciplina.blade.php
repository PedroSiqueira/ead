@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $disciplina->nome }}</h1>
    <p>Professor: {{ $disciplina->user->name }} • Data de início: {{ $disciplina->inicio }} • Data de término: {{ $disciplina->termino }}</p>
    <h3>{!!html_entity_decode($disciplina->descricao)!!}</h3>
    @if($matricula==0)
    <a href="/disciplina/matricular/{{ $disciplina->id }}" class="btn btn-primary">Matricular na Disciplina</a>
    @elseif($matricula==1)
    <div class="alert alert-warning">Inscrição realizada com sucesso! Aguarde o professor aceitar tua matrícula...</div>
    @endif
</div>
@endsection
