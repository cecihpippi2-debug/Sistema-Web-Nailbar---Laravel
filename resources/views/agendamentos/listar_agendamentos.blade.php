@extends('layouts.app')

@section('conteudo')

<section class="agenda-section">

    <div class="container">

        <h2 class="agenda-title">Agenda de Atendimentos 💅</h2>

        <!-- CALENDÁRIO -->
        <div class="agenda-calendar">

            <div class="calendar-header">
                <button class="calendar-nav">◀</button>
                <h3>Junho 2026</h3>
                <button class="calendar-nav">▶</button>
            </div>

            <div class="calendar-grid">

                <div class="calendar-day">Dom</div>
                <div class="calendar-day">Seg</div>
                <div class="calendar-day">Ter</div>
                <div class="calendar-day">Qua</div>
                <div class="calendar-day">Qui</div>
                <div class="calendar-day">Sex</div>
                <div class="calendar-day">Sáb</div>

                <div class="calendar-date">1</div>
                <div class="calendar-date booked">2</div>
                <div class="calendar-date booked">3</div>
                <div class="calendar-date">4</div>
                <div class="calendar-date">5</div>
                <div class="calendar-date booked">6</div>
                <div class="calendar-date">7</div>

                <div class="calendar-date">8</div>
                <div class="calendar-date">9</div>
                <div class="calendar-date booked">10</div>
                <div class="calendar-date">11</div>
                <div class="calendar-date booked">12</div>
                <div class="calendar-date booked">13</div>
                <div class="calendar-date">14</div>

                <div class="calendar-date booked">15</div>
                <div class="calendar-date">16</div>
                <div class="calendar-date">17</div>
                <div class="calendar-date booked">18</div>
                <div class="calendar-date booked">19</div>
                <div class="calendar-date">20</div>
                <div class="calendar-date booked">21</div>

                <div class="calendar-date ">22</div>
                <div class="calendar-date">23</div>
                <div class="calendar-date">24</div>
                <div class="calendar-date ">25</div>
                <div class="calendar-date booked">26</div>
                <div class="calendar-date">27</div>
                <div class="calendar-date booked">28</div>

            </div>

        </div>

        <!-- CRUD AGENDAMENTOS -->

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
                                        <option value="nome">--</option>
                                        <option value="data">Cliente</option>
                                        <option value="email">Data</option>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agendamentos as $agendamento)
                                <tr>
                                    <th scope='row'>{{ $agendamento->id}}</th>
                                    <td>{{ $agendamento->cliente }}</td>
                                    <td>{{ $agendamento->data }}</td>
                                    <td>{{ $agendamento->hora }}</td>
                                    <td>{{ $agendamento->telefone }}</td>
                                    <td>
                                        <a href="{{ route('agendamentos.exibir', $agendamento->id) }}" class="btn btn-sm btn-info">Ver</a>
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

@endsection