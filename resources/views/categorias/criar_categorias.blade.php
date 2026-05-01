@extends('layouts.app')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">

                <div class="card-header">
                    <h3>Cadastrar Categoria no Estoque</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control" name="descricao" placeholder="Digite a descrição">{{ old('descricao') }}</textarea>
                        </div>

                        <!-- PREMIUM -->
                        <div class="form-group mb-3">
                            <label> Categoria Premium *</label>
                            <select name="premium" class="form-control">
                                <option value="1" {{ old('premium') == 1 ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ old('premium') == 0 ? 'selected' : '' }}>Não</option>
                            </select>
                        </div>



                        <!-- BOTÕES -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection