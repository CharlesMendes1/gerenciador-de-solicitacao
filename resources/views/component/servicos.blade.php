<thead>
        <tr>
            @if(Auth::user()->tipo_conta == 'S')
                <th>Nome</th>
                <th>Descrição</th>
                @if(isset($acao) && $acao == true)
                    <th>Ações</th>
                @endif
            @else
                <th>Nome</th>
                <th>Valor</th>
                <th>Descrição</th>
                @if(isset($acao) && $acao == true)
                    <th>Ações</th>
                @endif
            @endif
        </tr>
    </thead>
    
    <tbody>
        @if (isset($item->servicos))
        @foreach($item->servicos as $key => $servico)
            <tr>
                @if(Auth::user()->tipo_conta == 'S')
                    <td>{{$servico->nome}}</td>
                    <td>{{$servico->descricao}}</td>
                @else
                    <td>{{$servico->nome}}</td>
                    <td>{{$servico->valor}}</td>
                    <td>{{$servico->descricao}}</td>
                @endif
                @if(isset($acao) && $acao == true)
                    <td>
                        <button id="btn-edit" type="button" class="btn btn-primary" data-id="{{isset($flag) ? $servico->id : $key}}" onclick="editarServico(this)">
                            <i class="ti-pencil"></i>
                        </button>
                        <button id="btn-excluir" type="button" class="btn btn-danger" data-id="{{isset($flag) ? $servico->id : $key}}" onclick="excluirServico(this)">
                            <i class="mdi mdi-close-box-outline"></i>
                        </button>
                    </td> 
                @endif
            </tr>
        @endforeach
        @endif
    </tbody>