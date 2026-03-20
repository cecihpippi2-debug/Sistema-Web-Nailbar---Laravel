@extends('layouts.app')

@section('conteudo')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <h3>Agenda de Atendimentos</h3>
                    </div>

                    <div class="card-body">

                        <div class="agenda-calendar">
                            <div id="calendar"></div>
                        </div>

                        <!-- EVENTOS VINDOS DO BACKEND -->
                        <script> //jS
                            const eventos = [
                                @foreach($agendamentos as $ag)
                                {
                                    title: "{{ $ag->cliente->nome }} - {{ $ag->servico->nome }}",
                                    start: "{{ $ag->data }}T{{ $ag->hora }}",
                                },
                                @endforeach
                            ];
                        </script>

                        <!-- FULLCALENDAR -->
                        <script>
                        document.addEventListener('DOMContentLoaded', function () {

                            var calendarEl = document.getElementById('calendar');

                            var calendar = new FullCalendar.Calendar(calendarEl, {

                                initialView: 'dayGridMonth',
                                locale: 'pt-br',

                                events: eventos,

                                eventColor: '#c97b84',
                                eventTextColor: '#fff',

                                height: 600,

                            });

                            calendar.render();
                        });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <h3>Gerenciar agendamentos</h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Barra de Pesquisa -->
                        <div class="search-bar mb-4">
                            <form method="POST" action="{{ route('agendamentos.search') }}">
                                @csrf
                                <div class="search-bar-content">
                                    <select class="form-control" name="tipo" required>
                                        <option value="">--</option>
                                        <option value="nome">Cliente</option>
                                        <option value="data">Data</option>
                                        <option value="telefone">Telefone</option>
                                    </select>
                                    <input type="text" class="form-control search-input" name="valor" placeholder="Pesquisar agendamento..." required>
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <a href="{{ route('agendamentos.index') }}" class="btn btn-secondary">Limpar</a>
                                </div>
                            </form>
                        </div>

                        <!-- Tabela de Agendamentos -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Data</th>
                                    <th>Hora</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agendamentos as $agendamento)
                                <tr>
                                    <th scope='row'>{{ $agendamento->id}}</th>
                                    <td>{{ $agendamento->cliente->nome ?? ''}}</td>
                                    <td>{{ \Carbon\Carbon::parse($agendamento->data)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($agendamento->hora)->format('H:i') }}</td>
                                    <td>{{ $agendamento->cliente->telefone ?? ''}}</td>
                                    <td>
                                        <a href="{{ route('agendamentos.editar', $agendamento->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- FAB -->
<a href="{{ route('agendamentos.criar') }}" class="fab-button" title="Novo Agendamento">
    <span>+</span>
</a>

<script>
function toggleChat() {
    const chat = document.getElementById('chat-box');

    if (chat.style.display === 'block') {
        chat.style.display = 'none';
    } else {
        chat.style.display = 'block';
    }
}
</script>

@endsection