@extends('layouts.app')

@if(Auth::check() && ($tipo == \App\Tipo::PROFESSOR || $tipo == \App\Tipo::ALUNO_MATRICULADO))
@section('sidebar')
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="/disciplina/ler/{{$disciplina->id}}">Conteúdo</a>
    <a href="/disciplina/participantes/{{$disciplina->id}}">Participantes</a>
</div>
@endsection

@section('sidebarMenuButton')
<button id='sidebarMenuButton' class="btn btn-outline-primary" onclick="openNav()">&#9776; Menu</button>
@endsection
@endif

@section('content')
<div class="container">
    <h1>{{ $disciplina->nome }}</h1>
    <p>Professor: {{ $disciplina->professor()->name }} • Data de início: {{ strftime('%d/%m/%Y', time($disciplina->inicio)) }} • Data de término: {{ strftime('%d/%m/%Y', time($disciplina->termino)) }}</p>

    @yield('disciplina_conteudo')

</div>
@endsection

@section('script')
<script src="{{ asset('js/masonry.pkgd.min.js') }}" ></script>
<script defer>
    var sidebarOpened = false;
    /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
    function openNav() {
        if (sidebarOpened) {
            sidebarOpened = false;
            closeNav();
            return;
        }
        sidebarOpened = true;
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