@extends('layouts.app')

@if(Auth::check() && ($tipo == \App\Tipo::PROFESSOR || $tipo == \App\Tipo::ALUNO_MATRICULADO))
@section('sidebar')
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>
@endsection

@section('sidebarMenuButton')
<button id='sidebarMenuButton' class="btn btn-outline-primary" onclick="openNav()">&#9776; Menu</button>
@endsection
@endif

@section('content')
<div class="container">
    <h1>{{ $disciplina->nome }}</h1>
    @if(Auth::check() && Auth::user()->professorDaDisciplina($disciplina->id) && $disciplina->novasInscricoes())
    <div class="alert alert-info">
        Novos inscritos! Acesse o menu <a href="#">Participantes</a> para aceitá-los.
    </div>
    @endif
    <p>Professor: {{ $disciplina->professor()->name }} • Data de início: {{ strftime('%d/%m/%Y', time($disciplina->inicio)) }} • Data de término: {{ strftime('%d/%m/%Y', time($disciplina->termino)) }}</p>
    <h3>{!!html_entity_decode($disciplina->descricao)!!}</h3>
    @if(Auth::guest())
    <div class="alert alert-warning">Você precisa se <a href="/login">autenticar</a> e estar matriculado para acessar o conteúdo da disciplina...</div>
    @elseif($tipo==\App\Tipo::ALUNO_INSCRITO)
    <div class="alert alert-warning">Inscrição realizada com sucesso! Aguarde o professor aceitar tua matrícula...</div>
    @elseif($tipo==\App\Tipo::NAO_INSCRITO)
    <a href="/disciplina/matricular/{{ $disciplina->id }}" class="btn btn-primary">Matricular na Disciplina</a>
    @endif
</div>
@endsection

@section('script')
<script>
    /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>
@endsection