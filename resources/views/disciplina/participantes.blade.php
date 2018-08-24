@extends('disciplina.disciplina')

@section('disciplina_conteudo')
<div class="container">
    @if(Auth::user()->id==$disciplina->professor()->id && count($inscritos))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h5>Novos Inscritos</h5>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col" colspan="2">Aceitar matrícula?</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inscritos as $i)
                    <tr>
                        <td>{{$i->name}}</td>
                        <td>{{$i->email}}</td>
                        <td>
                            <a href="/aceitar/{{ $i->id }}/{{$disciplina->id}}" class="btn btn-success"><i class="fas fa-check"></i> Aceitar</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger"><i class="fas fa-times"></i> Rejeitar</a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4"><a href="/aceitartodos/{{ $disciplina->id }}" class="btn btn-success"><i class="fas fa-check"></i> Aceitar todos</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <h5>Participantes</h5>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col">{{$disciplina->professor()->name}}</th>
                        <th scope="col">{{$disciplina->professor()->email}}</th>
                    </tr>
                    @foreach($matriculados as $i)
                    <tr>
                        <td>{{$i->name}}</td>
                        <td>{{$i->email}}</td>            
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
