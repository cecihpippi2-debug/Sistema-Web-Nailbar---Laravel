@extends('layouts.app')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">

                <div class="card-header">
                    <h3>Editar Serviço</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('servicos.update', $servico->id) }}" method="POST" enctype="multipart/form-data">
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

                        <!-- IMAGEM -->
                        <div class="form-group mb-3">
                            <label class="form-label">Imagem</label>

                            @php
                                $imagem = !empty($servico->imagem)
                                    ? $servico->imagem
                                    : 'images/sem_imagem.jpg';
                            @endphp

                            <!-- IMAGEM ATUAL -->
                            <div class="mb-2">
                                <p><strong>Imagem atual:</strong></p>
                                <img src="{{ asset('storage/' . $imagem) }}"
                                     width="150"
                                     height="150"
                                     style="object-fit: cover; border-radius: 15px;">
                            </div>

                            <!-- NOVA IMAGEM -->
                            <div class="mb-2">
                                <p><strong>Nova imagem:</strong></p>
                                <img id="preview"
                                     src="#"
                                     style="display:none; width:150px; height:150px; object-fit: cover; border-radius: 15px;">
                            </div>

                            <input type="file"
                                   name="imagem"
                                   class="form-control @error('imagem') is-invalid @enderror"
                                   onchange="previewImagem(event)">

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
                                   value="{{ old('nome', $servico->nome) }}"
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
                                      rows="3">{{ old('descricao', $servico->descricao) }}</textarea>

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
                                   value="{{ old('preco', $servico->preco) }}"
                                   required>

                            @error('preco')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- DECORAÇÃO 3D -->
                        <div class="form-group mb-3">
                            <label>Decoração 3D</label>
                            <select name="decoracao_3d" class="form-control">
                                <option value="1" {{ old('decoracao_3d', $servico->decoracao_3d) == 1 ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ old('decoracao_3d', $servico->decoracao_3d) == 0 ? 'selected' : '' }}>Não</option>
                            </select>
                        </div>

                        <!-- ESMALTE ESPECIAL -->
                        <div class="form-group mb-3">
                            <label>Esmalte Especial</label>
                            <select name="esmalte_especial" class="form-control">
                                <option value="1" {{ old('esmalte_especial', $servico->esmalte_especial) == 1 ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ old('esmalte_especial', $servico->esmalte_especial) == 0 ? 'selected' : '' }}>Não</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="cliente_id">Autora</label>
                            <select name="cliente_id" class="form-control tom-select">
                                <option value="">Selecione um cliente</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}"
                                        {{ old('cliente_id', $servico->cliente_id) == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- BOTÕES -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPT PREVIEW -->
<script>
function previewImagem(event) {
    const input = event.target;
    const preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection