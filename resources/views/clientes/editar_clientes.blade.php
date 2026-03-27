@extends('layouts.app')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Cliente</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" enctype="multipart/form-data">
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

                    <div class="form-group mb-3">
                        <label for="imagem" class="form-label">Imagem</label>

                        @php
                            $nome_imagem = !empty($cliente->imagem)
                                ? $cliente->imagem
                                : 'images/sem_imagem.jpg';
                        @endphp
                        
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $nome_imagem) }}"
                                class="rounded-circle"
                                width="150"
                                height="150"
                                style="object-fit: cover;"
                                alt="imagem">
                        </div>

                        <input type="file" 
                            name="imagem" 
                            id="imagem"
                            class="form-control @error('imagem') is-invalid @enderror">

                        @error('imagem')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                        <div class="form-group mb-3">
                            <label for="nome">Nome *</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" 
                                   id="nome" name="nome" value="{{ old('nome', $cliente->nome) }}" required> <!--old. Mostra os dados antigos para editar -->
                            @error('nome')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" 
                                    class="form-control @error('data_nascimento') is-invalid @enderror"
                                    name="data_nascimento"
                                    value="{{ old('data_nascimento', $cliente->data_nascimento?->format('Y-m-d')) }}">
                                
                                @error('data_nascimento')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $cliente->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="telefone">Telefone *</label>
                            <input type="text" class="form-control @error('telefone') is-invalid @enderror" 
                                   id="telefone" name="telefone" value="{{ old('telefone', $cliente->telefone) }}" required>
                            @error('telefone')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control @error('endereco') is-invalid @enderror" 
                                   id="endereco" name="endereco" value="{{ old('endereco', $cliente->endereco) }}">
                            @error('endereco')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="categoria" class="form-label">Categoria</label>
                            <select name="categoria" class="form-control mb-3">
                                <option value="">Selecione sua categoria</option>
                                <option value="Cliente" {{ old('categoria', $cliente->categoria ?? '') == 'Cliente' ? 'selected' : '' }}>Cliente</option>
                                <option value="Funcionaria" {{ old('categoria', $cliente->categoria ?? '') == 'Funcionaria' ? 'selected' : '' }}>Funcionária</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="observacoes">Observações</label>
                            <textarea class="form-control @error('observacoes') is-invalid @enderror" 
                                      id="observacoes" name="observacoes" rows="3">{{ old('observacoes', $cliente->observacoes) }}</textarea>
                            @error('observacoes')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
