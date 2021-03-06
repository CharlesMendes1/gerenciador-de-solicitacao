@php
// dd(session('novaSolicitacao')->produtos)
@endphp
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{!isset($id) ? 'Novo Produto' : 'Editar Produto' }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <p>itens obrigatorios (*)</p>
    
    <form id="cria-edita-produto" action="{{route( !isset($id) ? 'cadastrar_produto_solicitacao' : 'salvar_produto_solicitacao')}}" method="POST">
        @csrf
        <input type="hidden" name="id_produto" value="{{isset($id) ? $id :''}}">
        <div class="form-group mb-0">
            <label for="nome" class="col-form-label">Nome do Produto*</label>
            <input list="list_produtos" maxlength="100" type="text" class="form-control" id="nome" name="nome" value="{{$produto->nome}}">
            @if(!isset($id))
            <datalist id="list_produtos">
                @foreach ($produtos_fornecedor as $prod)
                    <option value="{{$prod['nome']}}">
                @endforeach
            </datalist>
            @endif
        </div>
        <div class="form-group mb-0">
            <label for="quantidade" min="1" class="col-form-label">Quantidade *</label>
            <input type="number" min="1" class="form-control" id="quantidade" name="quantidade" value="{{$produto->quantidade}}">
        </div>
        @if($habilitaCampo)
        <div class="form-group mb-0">
            <label for="valor" class="col-form-label">Valor Produto *</label>
            <input type="number" min="1" class="form-control" id="valor" name="valor" value="{{$produto->valor}}">
        </div>
        @endif
        <div class="form-group mb-0">
            <label for="descricao" class="col-form-label">Descricao *</label>
            <textarea class="form-control" id="descricao" name="descricao">{{$produto->descricao}}</textarea>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    <button id="btn-cadastro-produto" onclick="$('#cria-edita-produto').submit();" type="submit" class="btn btn-primary">Cadastrar</button>
</div>
</div>