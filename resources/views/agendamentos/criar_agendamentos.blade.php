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
                            document.getElementById('data').value = info.dateStr;

                        }

                    });

                    calendar.render();
                });
            </script>

            
            @php 
            if(!empty($agendamento->id)){
                $action = route('agendamentos.update', $agendamento->id);
            } else {
                $action = route('agendamentos.store');
            }
            @endphp

            <div class="login-form">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                @csrf
                    @if (!empty($agendamento->id))
                     @method('PUT')
                @endif

                <div class="form-group mb-3">
                    <label for="cliente_id">Cliente</label>
                    <select name="cliente_id" id="cliente_id" class="form-control tom-select">
                        <option value="">Digite ou selecione um cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">
                                {{ $cliente->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="servico_id">Serviço</label>
                    <select name="servico_id" id="servico_id" class="form-control tom-select">
                        <option value="">Digite ou selecione um serviço</option>
                        @foreach ($servicos as $servico)
                            <option value="{{ $servico->id }}">
                                {{ $servico->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="data">Data</label>
                    <input type="text" id="data" name="data" class="form-control"  placeholder="Selecione no calendário...">
                </div>

                <div class="form-group mb-3">
                    <label for="hora">Horário</label>
                    <input type="time" id="hora" name="hora" class="form-control">
                </div>

                <div class="login-buttons">
                    <button type="submit" class="btn-primary">Agendar</button>
                    <a href="{{ route('agendamentos.index') }}" class="btn-secondary">Cancelar</a>
                </div>

            </form>

        </div>

    </div>

</section>

@endsection