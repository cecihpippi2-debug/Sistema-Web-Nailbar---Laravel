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

        <div class="login-form">
            <form>
                <div class="form-group mb-3">
                    <label for="nome" class="form-label">Nome *</label>
                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
                </div>

                <div class="form-group mb-3">
                    <label for="nascimento" class="form-label">Data de Nascimento *</label>
                    <input type="date" class="form-control" name="nascimento">
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control" name="email" placeholder="Digite seu email">
                </div>

                <div class="form-group mb-3">
                    <label for="telefone" class="form-label">Telefone *</label>
                    <input type="text" class="form-control" name="telefone" placeholder="Digite seu telefone">
                </div>

                <div class="form-group mb-3">
                    <label for="endereco" class="form-label">Endereço *</label>
                    <input type="text" class="form-control" name="endereco" placeholder="Digite seu endereço">
                </div>

                <div class="form-group mb-3">
                    <label for="observacoes" class="form-label">Observações</label>
                    <input type="text" class="form-control" name="observacoes" placeholder="Digite suas observações">
                </div>

                <div class="login-buttons">
                    <button type="submit" class="btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>

    </div>
</section>

@endsection