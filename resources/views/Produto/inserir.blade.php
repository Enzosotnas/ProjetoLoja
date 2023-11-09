@extends('TemplateAdmin.index')

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">Cadastro de Produto</h1>
    <div class="card">
        <div class="card-body">
            <form action="/produto/inserir" method="post" style="display: flex; flex-direction: column">
                @csrf
                <label>Nome do Produto</label>
                <input type="text" name="nome" style="margin-bottom: 10px" placeholder="Teclado Mecânico">


                <label>Categoria</label>
                <select name="id_categoria" style="margin-bottom: 10px">
                    @foreach ($categorias as $dado)
                        <option value="{{ $dado["id"] }}">{{ $dado["nome"] }}</option>
                    @endforeach
                </select>

                <label>Marca</label>
                <select name="id_marca" style="margin-bottom: 10px">
                    @foreach ($marcas as $dado)
                        <option value="{{ $dado["id"] }}">{{ $dado["nome"] }}</option>
                    @endforeach
                </select>

                <label>Preço</label>
                <input type="text" name="preco" style="margin-bottom: 10px" placeholder="1000.00">

                <label>Quantidade</label>
                <input type="text" name="quantidade" style="margin-bottom: 10px" placeholder="10">


                <div style="width: 100%; display: flex; justify-content: flex-end">
                    <button type="submit" class="btn btn-success" style="width: 10%">Inserir</button>
                </div>
            </form>
        </div>
    </div>
@endsection
