@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($disciplinasProfessor != null)
            <div class="card mb-3">
                <h5 class="card-header">Disciplinas que ministro</h5>
                <ul class="list-group list-group-flush">
                    @foreach($disciplinasProfessor as $disc)
                    <li class="list-group-item">{{ $disc->nome }}
                        <span class="float-right">
                            @if($disc->novasInscricoes())
                            <div class="alert alert-info d-inline">Novos inscritos!</div>
                            @endif
                            <a href="/disciplina/ler/{{ $disc->id }}" class="btn btn-success"><i class="fas fa-eye"></i> Abrir</a>
                            <a href="/disciplina/editar/{{ $disc->id }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Editar</a>
                            <!--<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> Apagar</a>-->
                        </span>
                    </li>
                    @endforeach
                </ul>
                <div class="card-body">
                    <a href="/disciplina/novo" class="btn btn-primary"><i class="fas fa-plus-square"></i> Criar Disciplina</a>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($disciplinasAluno != null)
            <div class="card mb-3">
                <h5 class="card-header">Disciplinas matriculadas</h5>
                <ul class="list-group list-group-flush">
                    @foreach($disciplinasAluno as $disc)
                    <li class="list-group-item">{{ $disc->nome }}
                        <span class="float-right">
                            <a href="/disciplina/ler/{{ $disc->id }}" class="btn btn-success"><i class="fas fa-eye"></i> Abrir</a>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
