<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nail Bar</title>

        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Fontes Google -->
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
        
        <!-- Estilos customizados -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- FullCalendar -->
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">

        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
    </head>

    <body>

        <header class="header">
            <h1>Nail Bar</h1>
            <!-- rotas de navegação-->
            <nav>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('clientes.index') }}">Clientes</a>
                <a href="{{ route('agendamentos.index') }}">Agendamentos</a>
                <a href="{{ route('servicos.index') }}">Servicos</a>
                <a href="{{ route('categorias.index') }}">Estoque</a>

            </nav>
        </header>

        @if(!request()->routeIs('home'))
            <div class="container mt-3">
                <button onclick="history.back()" class="btn-voltar">
                    <
                </button>
            </div>
        @endif

        @yield('conteudo')

        <footer class="footer">
            <p>© 2026 Nail Bar</p>
        </footer>

        <!-- jQuery (select 2) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap 5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- FullCalendar -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

        <!-- Tom Select -->
        <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>  
        
        <!-- Script Tom Select -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {

                document.querySelectorAll('.tom-select').forEach(function(el) { // seleciona tudo com a classe 'tom-select'
                    if (!el.tomselect) { // evita duplicação
                        new TomSelect(el, {
                            create: false, //Não permite criar opções novas
                            placeholder: "Digite para buscar...",
                            allowEmptyOption: true //Opção vazia
                        });
                    }
                });

            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        @if (isset($grafico))
            {!! $grafico->script() !!}
        @endif

    </body>
</html>

