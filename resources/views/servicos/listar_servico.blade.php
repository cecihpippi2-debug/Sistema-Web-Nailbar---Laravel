@extends('layouts.app')

@section('conteudo')

<section class="montar-section">

    <h2 class="titulo">Aqui começa a sua experiência!</h2>

<!-- Barra de Pesquisa -->
                        <div class="search-bar mb-4">
                            <form method="POST" action="{{ route('servicos.search') }}">
                                @csrf
                                <label>
                                    <input type="checkbox" name="decoracao_3d" value="1"
                                    {{ request('decoracao_3d') ? 'checked' : '' }}>
                                    decoração 3D
                                </label>

                                <label>
                                    <input type="checkbox" name="esmalte_especial" value="1"
                                    {{ request('esmalte_especial') ? 'checked' : '' }}>
                                    esmalte especial
                                </label>

                                <div class="search-bar-content">
                                    <select class="form-control" name="tipo" required>
                                        <option value="nome">--</option>
                                        <option value="nome">Nome</option>
                                        <option value="preco">Preço</option>
                                    </select>
                                    <input type="text" class="form-control search-input" name="valor" placeholder="Pesquisar..." >
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Limpar</a>
                                </div>
                            </form>
                        </div>

    <!-- GRID (PINTEREST STYLE) -->
    <div class="grid-servicos">

        @foreach($servicos as $servico)

            @php
                $imagem = !empty($servico->imagem) ? $servico->imagem : 'images/sem_imagem.jpg';
            @endphp

            <a href="{{ route('servicos.exibir', $servico->id) }}" class="link-card">
                
                <div class="card-servico">
                    @php
                        $imagem = !empty($servico->imagem) ? $servico->imagem : 'images/sem_imagem.jpg';
                    @endphp
                    <img src="{{ asset('storage/' . $imagem) }}" alt="servico">
                    <div class="info">
                        <h4>{{ $servico->nome }}</h4>
                        <p>R$ {{ number_format($servico->preco, 2, ',', '.') }}</p>
                    </div>
                </div>

            </a>

        @endforeach

    </div>

</section>

<!-- FAB -->
<div class="fab-container">
    <a href="{{ route('servicos.criar') }}" class="fab-criar">
        Crie seu modelo
    </a>
</div>

@endsection