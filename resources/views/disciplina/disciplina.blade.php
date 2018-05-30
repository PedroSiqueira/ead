@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $disciplina->nome }}</h1>
    <p>Data de início: {{ $disciplina->inicio }} • Data de término: {{ $disciplina->termino }}</p>
    <h3>{!!html_entity_decode($disciplina->descricao)!!}</h3>
</div>
@endsection
