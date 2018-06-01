@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <h5 class="card-header">Disciplinas Disponíveis</h5>
            <div class="list-group">
                @foreach ($disciplinas as $disciplina)
                <a href="/disciplina/ler/{{ $disciplina->id }}" class="list-group-item list-group-item-action">{{ $disciplina->nome }}</a>
                @endforeach
            </div>
            <div class="card-footer">
                {{ $disciplinas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
