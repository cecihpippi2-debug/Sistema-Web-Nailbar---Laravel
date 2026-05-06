<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Relatório</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
        }
        h3 {
            text-align: center;
        }
    </style>
</head>

<body>

<h3>{{ $titulo }}</h3>
<img src="{{ storage_path('app/public/sem_imagem.png') }}" width="100">

@foreach ($categorias as $categoria)

    <h4>Categoria: {{ $categoria->nome }}</h4>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categoria->estoques as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

@endforeach

</body>
</html>