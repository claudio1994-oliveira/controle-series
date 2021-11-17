@extends('layout')
        @section('cabecalho')
        Adicionar Série
        @endsection
        @section('conteudo')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                </ul>
            </div>
            @endforeach
        @endif
            <form method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome">
                    </div>
                    <div class="col-3">
                        <label for="nome">Nº Temporadas</label>
                        <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
                    </div>
                    <div class="col-3">
                        <label for="nome">Eps por temporada</label>
                        <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
                    </div>
                </div>
                <button class="btn btn-primary mt-2">Adicionar</button>
            </form>
        @endsection

