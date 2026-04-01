@extends('layouts.app')

@section('conteudo')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">

                    <div class="card-header text-center">
                        <h3>Detalhes do Agendamento</h3>
                    </div>

                    <div class="card-body">

                        <!-- Cliente -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="client-details-label">Cliente</label>
                                <p class="client-details-value">
                                    {{ $agendamento->cliente->nome ?? 'Não informado' }}
                                </p>
                            </div>

                            <div class="col-md-6">
                                <label class="client-details-label">Telefone</label>
                                <p class="client-details-value">
                                    {{ $agendamento->cliente->telefone ?? 'Não informado' }}
                                </p>
                            </div>
                        </div>

                        <!-- DATA E HORA -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="client-details-label">Data</label>
                                <p class="client-details-value">
                                    {{ $agendamento->data->format('d/m/Y') }}
                                </p>
                            </div>

                            <div class="col-md-6">
                                <label class="client-details-label">Horário</label>
                                <p class="client-details-value">
                                    {{ $agendamento->hora }}
                                </p>
                            </div>
                        </div>

                        <!-- Foto cliente e sevico -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="client-details-label">Foto da Cliente</label>

                                @php
                                    $imgCliente = !empty($agendamento->cliente->imagem)
                                        ? 'storage/' . $agendamento->cliente->imagem
                                        : 'images/sem_imagem.jpg';
                                @endphp

                                <div class="mt-2">
                                    <img src="{{ asset($imgCliente) }}"
                                        style="width:200px; height:200px; object-fit:cover; border-radius:15px;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="client-details-label">Serviço</label>
                                <p class="client-details-value">
                                    {{ $agendamento->servico->nome ?? 'Não informado' }}
                                </p>

                                @php
                                    $imgServico = !empty($agendamento->servico->imagem)
                                        ? 'storage/' . $agendamento->servico->imagem
                                        : 'images/sem_imagem.jpg';
                                @endphp

                                <div class="mt-2">
                                    <img src="{{ asset($imgServico) }}"
                                        style="width:200px; height:200px; object-fit:cover; border-radius:15px;">
                                </div>
                            </div>
                        </div>

                        <!-- BOTÕES -->
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('agendamentos.index') }}" class="btn-action btn-action-voltar">
                                Voltar
                            </a>

                            <a href="{{ route('agendamentos.editar', $agendamento->id) }}" class="btn-action btn-action-editar">
                                Editar
                            </a>

                            <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-action btn-action-deletar"
                                    onclick="return confirm('Tem certeza?')">
                                    Deletar
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection