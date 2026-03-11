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

                <!-- dias exemplo -->
                <div class="calendar-date">1</div>
                <div class="calendar-date">2</div>
                <div class="calendar-date">3</div>
                <div class="calendar-date">4</div>
                <div class="calendar-date">5</div>
                <div class="calendar-date booked">6</div>
                <div class="calendar-date">7</div>

                <div class="calendar-date">8</div>
                <div class="calendar-date">9</div>
                <div class="calendar-date booked">10</div>
                <div class="calendar-date">11</div>
                <div class="calendar-date">12</div>
                <div class="calendar-date">13</div>
                <div class="calendar-date">14</div>

            </div>

        </div>

        <!-- CRUD AGENDAMENTOS -->

        <div class="agenda-crud">

            <h3 class="crud-title">Gerenciar Agendamentos</h3>

            <table class="agenda-table">

                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Serviço</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>Maria Silva</td>
                        <td>Manicure</td>
                        <td>12/06/2026</td>
                        <td>14:00</td>
                        <td>
                            <button class="btn-edit">Editar</button>
                            <button class="btn-delete">Excluir</button>
                        </td>
                    </tr>

                    <tr>
                        <td>Ana Souza</td>
                        <td>Alongamento</td>
                        <td>13/06/2026</td>
                        <td>10:00</td>
                        <td>
                            <button class="btn-edit">Editar</button>
                            <button class="btn-delete">Excluir</button>
                        </td>
                    </tr>

                </tbody>

            </table>

            <div class="crud-button-area">
                <button class="btn-primary">Novo Agendamento</button>
            </div>

        </div>

    </div>

</section>

@endsection