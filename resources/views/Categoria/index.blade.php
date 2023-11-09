@extends('TemplateAdmin.index')

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">Categoria de Produtos</h1>

    <div class="card">
        <div class="card-body">
            <a href="/categoria/inserir" class="btn btn-success" style="margin-bottom: 10px">Novo</a>
            <table class="table table-bordered dataTable">
                <thead>
                <td>ID</td>
                <td>Nome</td>
                <td>Situação</td>
                <td>Opções</td>
                </thead>
                <tbody>
                @foreach($listaCategorias as $item)
                    <tr>
                        <td>{{$item['id']}}</td>
                        <td>{{$item['nome']}}</td>
                        <td>{{$item['situacao']}}</td>
                        <td>
                            <div style="display: flex; width: 100%">
                                <form style="margin-left: 20px"
                                      action="{{ route('categoria.alterar', ['id' => $item['id']]) }}" method="get">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-success">
                                        <li class="fa fa-edit"></li> Editar
                                    </button>
                                </form>
                                <form style="display: inline-block; margin-left: 10px;" action="{{ route('categoria.excluir', ['id' => $item['id']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <li class="fa fa-trash"></li> Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
