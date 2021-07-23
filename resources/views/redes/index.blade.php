@extends('master')

@section('content_header')
    <h1>Cadastrar Rede</h1>
@stop

@section('content')
    @include('messages.flash')
    @include('messages.errors')

<a href="{{ route('redes.create') }}" class="btn btn-success">
    Adicionar Rede
</a>
<br>
<br>
<b>Nº de Redes Cadastradas:</b> {{$redes->count()}}
<br><br>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>IP Rede</th>
                <th>VLAN</th>
                <th>Gateway</th>
                <th>Hosts</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($redes as $rede)
            <tr>
                <td><a href="/redes/{{ $rede->id }}">{{ $rede->nome }}</a></td>
                <td>{{ $rede->iprede }}/{{ $rede->cidr }}</td>
                <td>{{ $rede->vlan }}</td>
                <td>{{ $rede->gateway }}</td>
                <td>{{ $rede->equipamentos->count() }}</td>
                <td>
                    <a href="{{action('App\Http\Controllers\RedeController@edit', $rede->id)}}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                </td>
                <td>
                    <form action="{{action('App\Http\Controllers\RedeController@destroy', $rede->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="delete-item btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop
