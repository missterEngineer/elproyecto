

<header class="headerUser">

    <div class="containerLogo">
        <img src="{{URL::asset('img/CEBMblade.png')}}">
    </div>
    <div class="containerInfoHeader">
        <div class="contenedorTitleHeaderUser">
            <h1 class="titleHeaderUser">
                Sistema de Inventario y Control de Artículos
            </h1>
        </div>
        <nav class="nav">
            <a href="{{ route('inicio') }}" class="a-nav">Inicio</a>
            @if(auth()->user()->profile_id == 3)
            <a href="{{ route('usuarios') }}" class="a-nav">Usuarios</a>
            @endif
            <a href="{{ route('articulos') }}" class="a-nav">Artículos</a>
            <a href="{{ route('articulos-entregados') }}" class="a-nav">Artículos entregados</a>
            <!-- <a href="{{ route('reportes') }}" class="a-nav">Reportes</a> -->
            @if(auth()->user()->profile_id == 3)
            <a href="{{ route('log') }}" class="a-nav">Bitácora</a>
            @endif
            <form class="a-nav" action="{{ route('logout') }}" method="post">
                {{ csrf_field() }}

                <button class="btn_logout">Cerrar sesión</button>
            </form>
        </nav>
    </div>
    
    
</header>