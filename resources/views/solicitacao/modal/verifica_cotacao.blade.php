<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Finalizar Cotação</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <p class="text-center">Tem certeza que deseja finalizar a cotação  ?</p>
    <form method="POST" id="form-finalizar-cotacao" action="{{route('finaliza_cotacao')}}">
        @csrf
        <input type="hidden" name="id_solicitacao" value="{{$solicitacao->id}}"">
    </form>
    <p class="text-center">Itens que ela possui :</p>
    <h3>Produtos</h3>
    @if($solicitacao->produtos->first() == [])
        <p>Não há produtos.</p>
    @else
    <div class="table-responsive">
        <table id="table-produto-solicitacao" class="display" style="width:100%">
            @component('component.produtos', ['item' => $solicitacao])@endcomponent
        </table>
    </div>                
    @endif

    <h3>Serviços</h3>
    @if($solicitacao->servicos->first() == [])
        <p>Não há serviços.</p>
    @else
    <div class="table-responsive">
        <table id="table-servico-solicitacao" class="display" style="width:100%">
            @component('component.servicos', ['item' => $solicitacao])@endcomponent
        </table>
    </div>                
    @endif
</div>    
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
    <button type="button" class="btn btn-danger" onclick="$('#form-finalizar-cotacao').submit();">Sim</button>
</div>

