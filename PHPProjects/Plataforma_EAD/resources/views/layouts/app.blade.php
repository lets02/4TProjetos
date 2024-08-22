<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Plataforma de Cursos Online')</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <a href="#" class="logo">Plataforma de Cursos Online</a>
                <div class="nav-buttons">
                    <ul>
                        <li><a href="{{ route('home') }}" class="btn-main">Início</a></li>

                        @auth('aluno')
                            <li><a href="{{ route('aluno.dashboard') }}" class="btn-main">Dashboard Aluno</a></li>
                            <li><a href="{{ route('aluno.cursos') }}" class="btn-main">Meus Cursos</a></li>
                        @endauth

                        @auth('professor')
                            <li><a href="{{ route('professor.dashboard') }}" class="btn-main">Dashboard Professor</a></li>
                            <li><a href="{{ route('cursos.create') }}" class="btn-main">Criar Curso</a></li>
                            <li><a href="{{ route('professor.cursos') }}" class="btn-main">Meus Cursos</a></li>
                        @endauth

                        @guest
                            <li><a href="{{ route('login.aluno') }}" class="btn-main">Login como Aluno</a></li>
                            <li><a href="{{ route('login.professor') }}" class="btn-main">Login como Professor</a></li>
                            <li><a href="{{ route('register') }}" class="btn-secondary">Cadastrar-se</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container">
            @auth('aluno')
                <form action="{{ route('logout.aluno') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-main">Logout Aluno</button>
                </form>
            @endauth

            @auth('professor')
                <form action="{{ route('logout.professor') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-main">Logout Professor</button>
                </form>
            @endauth
        </div>
    </footer>
</body>
</html>
