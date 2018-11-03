
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{!isset($usuario) ? 'Novo Usuario' : 'Editar Usuario' }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <p>itens obrigatorios (*)</p>
    <form id="cria-edita-usuario" action="{{route( !isset($usuario) ? 'cadastrar_usuario' : 'salvar_usuario')}}" method="POST">
        @csrf
        <input type="hidden" name="id_usuario" value="{{isset($usuario) ? $usuario->id :''}}">
        <div class="form-group mb-0">
            <label for="name" class="col-form-label">Nome do Usuario*</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{isset($usuario) ? $usuario->nome : ''}}">
        </div>
        <div class="form-group mb-0">
            <label for="quantidade" min="1" class="col-form-label">Email *</label>
            <input type="mail" class="form-control" id="email" name="email" value="{{isset($usuario) ? $usuario->email : ''}}">
        </div>
        <div class="form-group mb-0">
            <label for="valor" class="col-form-label">Senha *</label>
            <input type="password" class="form-control" id="senha" name="senha" value="{{isset($usuario) ? '' : ''}}">
        </div>
        <div class="form-group mb-0">
            <label for="descricao" class="col-form-label">Tipo do Perfil *</label>
            {{-- <textarea class="form-control" id="descricao" name="descricao">{{isset($id) ? session('novaSolicitacao')->produtos[$id]->descricao : ''}}</textarea> --}}
        </div>
        {{-- <a href="acoes/up-status-empresa.php?id=397&amp;status=I" data-placement="top" data-toggle="tooltip" data-original-title="Habilitado" class="btn btn-success tooltip-button" onclick="if(confirm('Tem certeza que deseja desabilitar a empresa(a) Acao_ItauPF')) { event.returnValue = true; return true; } event.returnValue = false; return false;">
            <i class="glyph-icon icon-check-circle"></i>
        </a> --}}
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    <button id="btn-cadastro-produto" onclick="$('#cria-edita-usuario').submit();" type="submit" class="btn btn-primary">{{isset($usuario->id)?'Editar': 'Cadastrar'}}</button>
</div>
</div>