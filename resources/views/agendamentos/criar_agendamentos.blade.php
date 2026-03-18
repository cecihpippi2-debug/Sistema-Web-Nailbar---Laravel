@extends('layouts.app')

@section('conteudo')

<section class="agendamento-section">

    <div class="agendamento-container">

        <h2>Agende seu horário 💅✨</h2>

        <div class="agendamento-content">

            <!-- CALENDÁRIO -->
            <div id="calendar"></div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {

                    var calendarEl = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {

                        initialView: 'dayGridMonth',

                        locale: 'pt-br',

                        selectable: true,

                        dateClick: function(info) {

                            // joga a data no input
                            document.getElementById('dataSelecionada').value = info.dateStr;

                        }

                    });

                    calendar.render();
                });
            </script>

            <!-- FORMULÁRIO -->
            <form action="#" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label>Cliente</label>
                    <select class="form-control">
                        <option>Selecione um cliente</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Serviço</label>
                    <select class="form-control">
                        <option>Selecione um serviço</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Data</label>
                    <input type="text" id="dataSelecionada" class="form-control" readonly>
                </div>

                <div class="form-group mb-3">
                    <label>Horário</label>
                    <input type="time" class="form-control">
                </div>

                <button type="submit" class="btn-primary">Agendar</button>

            </form>

        </div>

    </div>

</section>

@endsection