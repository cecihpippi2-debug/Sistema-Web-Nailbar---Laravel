@extends('layouts.app')

@section('conteudo')

<section class="login-section">
    <div class="login-card">

        <div class="login-header">
            <h2>Cadastre-se</h2>
            <p class="login-subtitle">
                Crie sua conta para começar sua experiência no Nail Bar!
            </p>
        </div>

        @php 
        if(!empty($cliente->id)){
            $action = route('clientes.update', $cliente->id);
        } else {
            $action = route('clientes.store');
        }
        @endphp

        <div class="login-form">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (!empty($cliente->id))
                    @method('PUT')
                @endif

                <div class="form-group mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="file" class="form-control" name="imagem" id="imagem">
                </div>

                <div class="form-group mb-3">
                    <label for="nome" class="form-label">Nome *</label>
                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome" value="{{ old('nome', $cliente->nome ?? '') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" name="data_nascimento" value="{{ old('data_nascimento', $cliente->data_nascimento ?? '') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control" name="email" placeholder="Digite seu email" value="{{ old('email', $cliente->email ?? '') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" name="telefone" placeholder="Digite seu telefone" value="{{ old('telefone', $cliente->telefone ?? '') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" name="endereco" placeholder="Digite seu endereço" value="{{ old('endereco', $cliente->endereco ?? '') }}">
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
                    <label for="observacoes" class="form-label">Observações</label>
                    <textarea class="form-control" name="observacoes" placeholder="Digite suas observações">{{ old('observacoes', $cliente->observacoes ?? ''            ) }}</textarea>
                </div>

                <hr class="divisor">

                <div class="login-buttons">
                    <button type="submit" class="btn-primary">Cadastrar</button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>

    </div>
</section>

@endsection