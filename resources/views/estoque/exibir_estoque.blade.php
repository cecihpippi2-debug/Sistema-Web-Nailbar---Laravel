@extends('layouts.app')

@section('conteudo')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header" style="text-align: center;">
                        <h3>Detalhes do produto {{ $estoque->nome }}</h3>
                    </div>

                    <div class="card-body">

                        <div class="row mb-4">

                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Nome</label>
                                <p class="client-details-value">{{ $estoque->nome }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Preço</label>
                                <p class="client-details-value">
                                    R$ {{ number_format($estoque->preco, 2, ',', '.') }}
                                </p>
                            </div>

                        </div>


                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Descrição</label>
                                <p class="client-details-value">
                                    {{ $estoque->descricao ?? 'Sem descrição' }}
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Quantidade</label>
                                <p class="client-details-value">
                                    {{ $estoque->quantidade }}
                                </p>
                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="client-details-label">Categoria</label>
                                <p class="client-details-value">
                                    {{ $estoque->categoria->nome ?? 'Não informado' }}
                                </p>
                            </div>
                        </div>

                        <!-- BOTÕES -->
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('estoque.index') }}" class="btn-action btn-action-voltar">Voltar</a>

                            <a href="{{ route('estoque.edit', $estoque->id) }}" class="btn-action btn-action-editar">
                                Editar
                            </a>

                            <form action="{{ route('estoque.destroy', $estoque->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn-action btn-action-deletar"
                                    onclick="return confirm('Tem certeza?')">
                                    Deletar
                                </button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection