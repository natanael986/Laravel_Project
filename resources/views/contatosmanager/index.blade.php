@extends('site.layout')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Projeto Laravel - Mensagens enviadas</h1>
    <hr class="my-4">
</div>
<div class="container">
    <a class="btn btn-success" href="{{ route('site.contatos') }}">Enviar nova Mensagem</a>
    <p></p>
    @if ($message = Session::get('success'))
    <p></p>
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Mensagem</th>
            <th>Data</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($contatos as $contato)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $contato->nome}}</td>
            <td>{{ $contato->mensagem }}</td>
            <td>{{ $contato->updated_at}}</td>
            <td>
                <form action="{{ route('contatosmanager.destroy', $contato->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('contatosmanager.show', $contato->id) }}">Exibir</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $contatos->links() !!}
</div>

@endsection