@extends('layouts.app')

@section('conteudo')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <h3>Detalhes da Cliente</h3>
                    </div>
                    <div class="card-body">
                        
                        <!-- Informações em Colunas -->
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Nome</label>
                                <p class="client-details-value">{{ $cliente->nome }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Data de Nascimento</label>
                                <p class="client-details-value">{{ $cliente->data_nascimento}}</p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Email</label>
                                <p class="client-details-value">{{ $cliente->email }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Telefone</label>
                                <p class="client-details-value">{{ $cliente->telefone ?? 'Não informado' }}</p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Endereço</label>
                                <p class="client-details-value">{{ $cliente->endereco ?? 'Não informado' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Data de Cadastro</label>
                                <p class="client-details-value">{{ $cliente->created_at?->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="client-details-label">Observações</label>
                                <p class="client-details-value">{{ $cliente->observacoes ?? 'Nenhuma observação' }}</p>
                            </div>
                        </div>

                        <!-- Botões de Ações -->
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('clientes.index') }}" class="btn-action btn-action-voltar">Voltar</a>
                            <a href="{{ route('clientes.editar', $cliente->id) }}" class="btn-action btn-action-editar">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-action-deletar" onclick="return confirm('Tem certeza?')">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
