@extends('layouts.app')

@section('conteudo')
<section>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <h3>Estoque Categoria - {{ $categoria->nome }}</h3>
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
                            <form method="POST" action="{{ route('estoque.search', $categoria->id) }}">
                                @csrf

                                <input type="hidden" name="categoria_id" value="{{ $categoria->id }}">

                                <div class="search-bar-content">
                                    <select class="form-control" name="tipo" required>
                                        <option value="nome">--</option>
                                        <option value="nome">Nome</option>
                                        <option value="preco">Preço</option>
                                    </select>
                                    <input type="text" class="form-control search-input" name="valor" placeholder="Pesquisar produto..." required>
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <a href="{{ route('categorias.estoque', $categoria->id) }}" class="btn btn-secondary">Limpar</a>
                                </div>
                            </form>
                        </div>

                        <!-- Tabela de Produtos do estoque -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estoques as $estoque)
                                <tr>
                                    <th scope='row'>{{ $estoque->id}}</th>
                                    <td>{{ $estoque->nome }}</td>
                                    <td>{{ $estoque->quantidade }}</td>
                                    <td>{{ $estoque->preco }}</td>
                                    <td>
                                        <a href="{{ route('estoque.show', $estoque->id) }}" class="btn btn-sm btn-info">Ver</a>
                                        <a href="{{ route('estoque.edit', $estoque->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('estoque.destroy', $estoque->id) }}" method="POST" style="display:inline;">
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
<a href="{{ route('estoque.create', ['categoria_id' => $categoria->id]) }}" class="fab-button">
    +
</a>

@endsection
