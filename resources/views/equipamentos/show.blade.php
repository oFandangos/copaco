@extends('master')

@section('content_header')
  <h1>Equipamento: {{ $equipamento->macaddress }} </h1>
@stop

@section('content')
    @include('messages.flash')
    @include('messages.errors')

<div class="card">
  <div class="card-header">Dados do Equipamento</div>
  <div class="card-body">

    <ul class="list-group list-group-flush">
      <li class="list-group-item"><b>Patrimônio:</b> {{$equipamento->patrimonio}} </li>
      <li class="list-group-item"><b>Descrição:</b> {{$equipamento->descricao}} </li>
      <li class="list-group-item"><b>Mac Address:</b> {{ $equipamento->macaddress }}</li>
      <li class="list-group-item"><b>Local:</b> {{ $equipamento->local }}</li>
      <li class="list-group-item"><b>Vencimento:</b> {{ \Carbon\Carbon::CreateFromFormat('Y-m-d', $equipamento->vencimento)->format('d/m/Y') }}</li>
      <li class="list-group-item"><b>Rede:</b> {{ $equipamento->rede->nome ?? '' }}</li>
      <li class="list-group-item"><b>IP:</b> {{ $equipamento->ip ?? '' }}</li>
      <li class="list-group-item"><b>Responsável</b>: {{ $equipamento->user->name }}</li>

    </ul>
  </div>
</div>
</br>
<div class="row">
  <div class="col-12 col-sm-6 col-md-8">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
  </div>
  <div class="col-6 col-md-4">
    <div class="row float-right">
      <div class="col-auto">
        <a href="{{action('App\Http\Controllers\EquipamentoController@edit', $equipamento->id)}}" class="btn btn-warning">Editar</a>
      </div>
      <div class="col-auto">
        <form action="{{action('App\Http\Controllers\EquipamentoController@destroy', $equipamento->id)}}" method="post">
          {{csrf_field()}} {{ method_field('delete') }}
          <button class="delete-item btn btn-danger" type="submit">Deletar</button>
        </form>
      </div>
      </div>
  </div>  
</div>
<br>
<h2>Alterações nesse equipamento</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Data</th>
      <th scope="col">Usuário(a)</th>
    </tr>
  </thead>
  <tbody>
  @foreach($changes as $change)
    <tr>
      <th> {{ $change['when'] }} </th>
      <th> {{ $change['username'] }} - {{ $change['name'] }}</th>
    </tr>
    @endforeach
  </tdoby>
</table>

@stop

