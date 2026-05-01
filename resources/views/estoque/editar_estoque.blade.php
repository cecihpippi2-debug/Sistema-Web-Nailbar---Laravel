@extends('layouts.app')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">

                <div class="card-header">
                    <h3>Editar Produto - {{ $estoque->nome }}</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('estoque.update', $estoque->id) }}" method="POST" enctype="multipart/form-data">
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

                        <!-- NOME -->
                        <div class="form-group mb-3">
                            <label>Nome *</label>
                            <input type="text"
                                   name="nome"
                                   class="form-control @error('nome') is-invalid @enderror"
                                   value="{{ old('nome', $estoque->nome) }}"
                                   required>

                            @error('nome')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- DESCRIÇÃO -->
                        <div class="form-group mb-3">
                            <label>Descrição</label>
                            <textarea name="descricao"
                                      class="form-control @error('descricao') is-invalid @enderror"
                                      rows="3">{{ old('descricao', $estoque->descricao) }}</textarea>

                            @error('descricao')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- QUANTIDADE -->
                        <div class="form-group mb-3">
                            <label>Quantidade</label>
                            <input type="number"
                                   name="quantidade"
                                   class="form-control @error('quantidade') is-invalid @enderror"
                                   value="{{ old('quantidade', $estoque->quantidade) }}"
                                   required>

                            @error('quantidade')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- PREÇO -->
                        <div class="form-group mb-3">
                            <label>Preço</label>
                            <input type="number"
                                   name="preco"
                                   step="0.01"
                                   class="form-control @error('preco') is-invalid @enderror"
                                   value="{{ old('preco', $estoque->preco) }}"
                                   required>

                            @error('preco')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- CATEGORIA TOM-SELECT -->
                        <div class="form-group mb-3">
                            <label for="categoria_id">Categoria</label>
                            <select name="categoria_id" class="form-control tom-select">
                                <option value="">Selecione uma categoria</option>

                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ old('categoria_id', $estoque->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- BOTÕES -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="{{ route('estoque.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection