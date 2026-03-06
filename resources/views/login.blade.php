@extends('layouts.app')

@section('conteudo')

<section class="login-section">
    <div class="login-card">

        <div class="login-header">
            <h2>Bem vinda de volta 💅✨</h2>
            <p class="login-subtitle">
                Entre na sua conta para continuar criando unhas incríveis
                ou cadastre-se para começar sua experiência no Nail Bar!
            </p>
        </div>

        <div class="login-form">
            <form>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control" name="email" placeholder="Digite seu email">
                </div>

                <div class="form-group mb-3">
                    <label for="senha" class="form-label">Senha *</label>
                    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
                </div>

                <hr class="divisor">

                <div class="login-buttons">
                    <button type="submit" class="btn-primary">Entrar</button>
                </div>
            </form>
        </div>

        <div class="register-area">
            <p>Ainda não tem conta?</p>
            <a href="{{ url('/clientes/criar') }}" class="btn-secondary">Criar conta</a>
        </div>

    </div>
</section>

@endsection