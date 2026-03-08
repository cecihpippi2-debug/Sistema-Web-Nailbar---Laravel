@extends('layouts.app')

@section('conteudo')
<section>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <h3>Clientes</h3>
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
                            <form method="POST" action="{{ route('clientes.search') }}">
                                @csrf
                                <div class="search-bar-content">
                                    <select class="form-control" name="tipo" required>
                                        <option value="nome">--</option>
                                        <option value="nome">Nome</option>
                                        <option value="email">Email</option>
                                        <option value="telefone">Telefone</option>
                                    </select>
                                    <input type="text" class="form-control search-input" name="valor" placeholder="Pesquisar cliente..." required>
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Limpar</a>
                                </div>
                            </form>
                        </div>

                        <!-- Tabela de Clientes -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                <tr>
                                    <th scope='row'>{{ $cliente->id}}</th>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>{{ $cliente->telefone }}</td>
                                    <td>
                                        <a href="{{ route('clientes.exibir', $cliente->id) }}" class="btn btn-sm btn-info">Ver</a>
                                        <a href="{{ route('clientes.editar', $cliente->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
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
<a href="{{ route('clientes.criar') }}" class="fab-button" title="Novo Cliente">
    <span>+</span>
</a>

@endsection
