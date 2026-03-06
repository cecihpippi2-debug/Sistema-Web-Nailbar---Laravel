@extends('layouts.app')

@section('conteudo')
<section>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <h3>Clientes</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>João Silva</td>
                                    <td>joao@example.com</td>
                                    <td>(11) 98765-4321</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">Ver</a>
                                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                        <button class="btn btn-sm btn-danger">Deletar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Maria Santos</td>
                                    <td>maria@example.com</td>
                                    <td>(11) 99876-5432</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">Ver</a>
                                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                        <button class="btn btn-sm btn-danger">Deletar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- FAB -->
<a href="{{ route('clientes.criar') }}" class="fab-button" title="Novo Cliente">
    <span>+</span>
</a>

@endsection
