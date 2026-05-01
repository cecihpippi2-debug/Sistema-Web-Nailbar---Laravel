@extends('layouts.app')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Categoria - {{ $categoria->nome }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data">
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

                        <!-- NOME -->
                        <div class="form-group mb-3">
                            <label for="nome">Nome *</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" 
                                   id="nome" name="nome" value="{{ old('nome', $categoria->nome) }}" required> 
                            @error('nome')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- DESCRIÇÃO -->
                        <div class="form-group mb-3">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control @error('descricao') is-invalid @enderror" 
                                      id="descricao" name="descricao" rows="3">{{ old('descricao', $categoria->descricao) }}</textarea>
                            @error('descricao')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- PREMIUM -->
                        <div class="form-group mb-3">
                            <label>Categoria Premium</label>
                            <select name="premium" class="form-control">
                                <option value="1" {{ old('premium', $categoria->premium) == 1 ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ old('premium', $categoria->premium) == 0 ? 'selected' : '' }}>Não</option>
                            </select>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
