<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Relatório de Clientes</title>
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
<img src="{{ storage_path('app\public\images\imagem_servicos\20260319382138.jpg') }}" width="200">


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <th>{{ $cliente->id }}</th>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->telefone }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>