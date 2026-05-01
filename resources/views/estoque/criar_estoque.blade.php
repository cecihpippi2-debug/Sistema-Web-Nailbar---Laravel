@extends('layouts.app')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">

                <div class="card-header">
                    <h3>Cadastrar Produto no Estoque</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('estoque.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

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
                                   value="{{ old('nome') }}"
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
                                      rows="3">{{ old('descricao') }}</textarea>

                            @error('descricao')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- QUANTIDADE -->
                        <div class="form-group mb-3">
                            <label>Quantidade *</label>
                            <input type="number"
                                   name="quantidade"
                                   class="form-control @error('quantidade') is-invalid @enderror"
                                   value="{{ old('quantidade') }}"
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
                                   value="{{ old('preco') }}"
                                   required>

                            @error('preco')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- CATEGORIA TOM-SELECT-->
                        <div class="form-group mb-3">
                            <label for="categoria_id">Categoria *</label>
                            <select name="categoria_id" id="categoria_id" class="form-control tom-select">
                                <!-- Opção vazia -->
                                <option value="">Digite ou selecione uma categoria</option>

                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ old('categoria_id', $categoriaSelecionada->id) == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- BOTÕES -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Cadastrar</button>

                            @if(!empty($categoriaSelecionada))
                                <a href="{{ route('categorias.estoque', $categoriaSelecionada->id) }}" class="btn btn-secondary">Cancelar</a>
                            @else
                                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                            @endif

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<!-- Mantém a categoria selecionada no tom-select -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        const select = document.querySelector('#categoria_id');

        if (select && select.tomselect) {
            select.tomselect.setValue("{{ old('categoria_id', $categoriaSelecionada->id) }}");
        }
    }, 100);
});
</script>