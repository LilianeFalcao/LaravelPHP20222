@extends('restrict.layout')

@section('content')

<div>
    <a href="{{ url('topico/create')}}" class="button"> Adicionar </a>
</div>
<table>
    <thead>
        <tr>
            <th>Tópico</th>
            <th>Editar</th>
            <th>Remover</th>
        </tr>
    </thead>
    <tbody>
        @foreach($topicos as $topico)
        <tr>
        
        </tr>
        @endforeach
    </tbody>
</table>
@endsection