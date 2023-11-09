@extends('TemplateAdmin.index')

@section('contents')

@php
    use App\Models\Marca;
    use App\Models\Categoria;

    $titulo = "Inclusão de um novo produto!!!";
    $endpoint = "/produto/inserir";
    $input_nome = "";
    $input_quantidade = "";
    $input_preco = "";
    $input_id_marca = "";
    $input_id_categoria = "";
    $input_id = "";
    $input_descricao = "";

    $marcas = Marca::all();
    $categorias = Categoria::all();


    if (isset($produto)) {
        $titulo = "Alteração de marca";
        $endpoint = "/produto/update";
        $input_nome = $produto['nome'];
        $input_quantidade = $produto['quantidade'];
        $input_preco = $produto['preco'];
        $input_id_marca = $produto['id_marca'];
        $input_id_categoria = $produto['id_categoria'];
        $input_descricao = $produto['descricao'];

    }

@endphp



<h1 class="h3 mb-4 text-gray-800"> {{ $titulo }}</h1>
<div class="card">
    <div class="card-header">
        Cadastro de Produto
    </div>
    <div class="card-body">
        <form method="post" action="{{ $endpoint }}">
            @CSRF
            <input type="hidden" name="id" value="{{ $produto['id'] }}">

            <label class="form-label">Nome do produto</label>
            <input class="form-control" name="nome"
                        placeholder="Teclado Mecânico"
                        value="{{ $input_nome }}">

            <label class="form-label">Quantidade</label>
            <input class="form-control" name="quantidade"
                        placeholder="10"
                        value="{{ $input_quantidade }}">


            <label class="form-label">Preço</label>
            <input class="form-control" name="preco"
                        placeholder="1000.00"
                        value="{{ $input_preco }}">

            <label class="form-label">Marca</label>
            <select class="form-control" name="id_marca">
                @foreach($marcas as $dado)
                    <option value="{{ $dado->id }}" {{ $input_id_marca == $dado->id ? 'selected' : '' }}>
                        {{ $dado->nome }}
                    </option>
                @endforeach
            </select>

            <label class="form-label">Categoria</label>
            <select class="form-control" name="id_categoria">
                @foreach($categorias as $dado)
                    <option value="{{ $dado->id }}" {{ $input_id_categoria == $dado->id ? 'selected' : '' }}>
                        {{ $dado->nome }}
                    </option>
                @endforeach
            </select>

            <label class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control">{{ $input_descricao }}</textarea>

            <br/>
            <input type="submit" class="btn btn-success"
                value="SALVAR" />
        </form>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#descricao',
        height: 300,
        plugins: 'link',
        toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | link',
    });
</script>

@endsection
