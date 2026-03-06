@extends('layouts.app')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Detalhes do Cliente</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5>Nome</h5>
                            <p>{{ $cliente->nome }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Email</h5>
                            <p>{{ $cliente->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5>Telefone</h5>
                            <p>{{ $cliente->telefone }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Endereço</h5>
                            <p>{{ $cliente->endereco ?? 'Não informado' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5>Observações</h5>
                            <p>{{ $cliente->observacoes ?? 'Nenhuma observação' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5>Data de Cadastro</h5>
                            <p>{{ $cliente->created_at?->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('clientes.editar', $cliente->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
                        <form action="{{ route('clientes.deletar', $cliente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Deletar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
