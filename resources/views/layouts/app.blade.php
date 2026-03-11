<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nail Bar</title>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Fontes Google -->
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
        
        <!-- Estilos customizados -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>

        <header class="header">
            <h1>Nail Bar</h1>
            <!-- rotas de navegação-->
            <nav>
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('montar') }}">Monte sua unha</a>
                <a href="{{ route('agendar') }}">Agendamentos</a>
            </nav>
        </header>

        @yield('conteudo')

        <footer class="footer">
            <p>© 2026 Nail Bar</p>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

