@extends('layouts.app')

@section('conteudo')
<section>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <h3>Categorias do Estoque</h3>
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
                            <form method="POST" action="{{ route('categorias.search') }}">
                                @csrf
                                <div class="search-bar-content">
                                    <select class="form-control" name="tipo" required>
                                        <option value="nome">Nome</option>
                                    </select>
                                    <input type="text" class="form-control search-input" name="valor" placeholder="Pesquisar categoria..." required>
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Limpar</a>
                                </div>
                            </form>
                        </div>

                        <!-- Tabela de Categorias -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Premium</th>
                                    <th>Produtos</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                <tr>
                                    <th scope='row'>{{ $categoria->id}}</th>
                                    <td>{{ $categoria->nome }}</td>
                                    <td>{{ $categoria->descricao }}</td>
                                    <td>{{ $categoria->premium ? 'Sim' : 'Não' }}</td> 
                                    <td>
                                        <a href="{{ route('categorias.estoque', $categoria->id) }}" class="btn btn-sm btn-info">
                                            Ver Categoria - {{ $categoria->estoques->count() }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="card mt-4">
                            <div class="card-header">
                                <h4>Produtos por Categoria</h4>
                            </div>
                            <div class="card-body">
                                {!! $grafico->container() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- FAB -->
<a href="{{ route('categorias.create') }}" class="fab-button" title="Nova Categoria">
    <span>+</span>
</a>

@endsection
