@extends('layouts.app')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">

                <div class="card-header">
                    <h3>Cadastrar Serviço</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('servicos.store') }}" method="POST" enctype="multipart/form-data">
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

                        <!-- IMAGEM -->
                        <div class="form-group mb-3">
                            <label class="form-label">Imagem</label>

                            @php
                                $nome_imagem = 'images/sem_imagem.jpg';
                            @endphp

                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $nome_imagem) }}"
                                     width="150px" height="150px"
                                     style="object-fit: cover; border-radius: 15px;">
                            </div>

                            <input type="file"
                                name="imagem"
                                class="form-control @error('imagem') is-invalid @enderror">

                            @error('imagem')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

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

                        <!-- PREÇO -->
                        <div class="form-group mb-3">
                            <label>Preço *</label>
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

                        <!-- DECORAÇÃO 3D -->
                        <div class="form-group mb-3">
                            <label>Decoração 3D</label>
                            <select name="decoracao_3d" class="form-control">
                                <option value="1" {{ old('decoracao_3d') == 1 ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ old('decoracao_3d') == 0 ? 'selected' : '' }}>Não</option>
                            </select>
                        </div>

                        <!-- ESMALTE ESPECIAL -->
                        <div class="form-group mb-3">
                            <label>Esmalte Especial</label>
                            <select name="esmalte_especial" class="form-control">
                                <option value="1" {{ old('esmalte_especial') == 1 ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ old('esmalte_especial') == 0 ? 'selected' : '' }}>Não</option>
                            </select>
                        </div>

                        <!-- Cliente Tom-Select-->
                        <div class="form-group mb-3">
                            <label for="cliente_id">Autora (opcional)</label>
                            <select name="cliente_id" id="cliente_id" class="form-control tom-select">
                                <!-- Opção vazia -->
                                <option value="">Digite ou selecione um cliente</option>
                                <!-- Passa cada cliente como opção -->
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">
                                        {{ $cliente->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- BOTÕES -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                            <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection