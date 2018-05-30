@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($disciplinasProfessor != null)
            <div class="card">
                <div class="card-header">Disciplinas que ministro</div>
                <ul class="list-group list-group-flush">
                    @foreach($disciplinasProfessor as $disciplina)
                    <li class="list-group-item">{{ $disciplina->nome }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
