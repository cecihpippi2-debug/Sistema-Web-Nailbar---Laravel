@extends('layouts.app')

@section('conteudo')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header" style="text-align: center;">
                        <h3>Detalhes do Serviço</h3>
                    </div>

                    <div class="card-body">

                        <div class="row mb-4">

                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Nome</label>
                                <p class="client-details-value">{{ $servico->nome }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Preço</label>
                                <p class="client-details-value">
                                    R$ {{ number_format($servico->preco, 2, ',', '.') }}
                                </p>
                            </div>

                        </div>

                        <div class="row mb-4">

                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Decoração 3D</label>
                                <p class="client-details-value">
                                    {{ $servico->decoracao_3d ? 'Sim' : 'Não' }}
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Esmalte Especial</label>
                                <p class="client-details-value">
                                    {{ $servico->esmalte_especial ? 'Sim' : 'Não' }}
                                </p>
                            </div>

                        </div>

                        <div class="row mb-4">

                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Descrição</label>
                                <p class="client-details-value">
                                    {{ $servico->descricao ?? 'Sem descrição' }}
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="client-details-label">Imagem do Serviço</label>

                                <div class="mt-3">
                                    @if($servico->imagem)
                                        <img src="{{ asset('storage/' . $servico->imagem) }}"
                                            style="width:250px; height:250px; object-fit:cover; border-radius:15px;">
                                    @else
                                        <p class="client-details-value">Sem imagem.</p>
                                    @endif
                                </div>

                            </div>

                        </div>

                        <!-- BOTÕES -->
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('servicos.index') }}" class="btn-action btn-action-voltar">Voltar</a>

                            <a href="{{ route('servicos.editar', $servico->id) }}" class="btn-action btn-action-editar">
                                Editar
                            </a>

                            <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST">
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