@extends('TemplateAdmin.index')

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">Cadastro de Produtos</h1>

    <div class="card">
        <div class="card-body">
            <a href="/produto/inserir" class="btn btn-success" style="margin-bottom: 10px">Novo</a>
            <table class="table table-bordered dataTable">
                <thead>
                <td>ID</td>
                <td>Nome</td>
                <td>Quantidade</td>
                <td>Preço</td>
                <td>Marca</td>
                <td>Categoria</td>
            </thead>
            <tbody>
                @foreach ($produtos as $dados)
                <tr>
                    <td>{{ $dados['id'] }}</td>
                    <td>{{ $dados['nome'] }}</td>
                    <td>{{ $dados['quantidade'] }}</td>
                    <td>{{ $dados['preco'] }}</td>
                    <td>{{ $dados['mar'] }}</td>
                    <td>{{ $dados['cat'] }}</td>
                    <td>
                        <a href="/produto/update/{{ $dados['id'] }}" class="btn btn-success">
                            <li class="fa fa-edit"></li> Editar
                        </a>
                        <form style="display: inline-block; margin-left: 10px;" action="{{ route('produto.excluir', ['id' => $dados['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <li class="fa fa-trash"></li> Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
@endsection
