@extends('layouts.app')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Agendamento</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $erro)
                                        <li>{{ $erro }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- CLIENTE -->
                        <div class="form-group mb-3">
                            <label for="cliente_id">Cliente</label>
                            <select name="cliente_id" class="form-control tom-select">
                                <option value="">Selecione um cliente</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}"
                                        {{ old('cliente_id', $agendamento->cliente_id) == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- SERVIÇO -->
                        <div class="form-group mb-3">
                            <label for="servico_id">Serviço</label>
                            <select name="servico_id" class="form-control tom-select">
                                <option value="">Selecione um serviço</option>
                                @foreach ($servicos as $servico)
                                    <option value="{{ $servico->id }}"
                                        {{ old('servico_id', $agendamento->servico_id) == $servico->id ? 'selected' : '' }}>
                                        {{ $servico->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- DATA -->
                            <div class="form-group mb-3">
                                <label for="data">Data</label>
                                <input type="date" 
                                    class="form-control @error('data') is-invalid @enderror"
                                    name="data"
                                    value="{{ old('data', $agendamento->data?->format('Y-m-d')) }}">
                                
                                @error('data')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        <!-- HORA -->
                        <div class="form-group mb-3">
                            <label for="hora">Horário</label>
                            <input type="time" 
                                class="form-control @error('hora') is-invalid @enderror"
                                name="hora"
                                value="{{ old('hora', $agendamento->hora) }}">
                            
                            @error('hora')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- BOTÕES -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="{{ route('agendamentos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection