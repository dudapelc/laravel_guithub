@extends('partials.layout')

@section('content')

@include('partials.menu')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1> LaraBlog - Usuários</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            @include('partials.errors')
            
            @if($user->id)
            <form action="{{route('users.update', ['id' => $user->id])}}" method="POST">
            {{method_field('PUT')}}
            @else
            <form action="{{route('users.store')}}" method="POST">
            @endif

                {{csrf_field()}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="from-control" placeholder="Digite o nome do Usuário" value="{{ $user->name}}">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="email">E-mail</label>
                        <input type="text" email="email" id="email" class="from-control" placeholder="Digite o E-mail do Usuário" value="{{ $user->email}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password"> Senha (Para manter a senha atual basta manter o campo em branco)</label>
                        <input type="password" password="password" id="password" class="from-control">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="password_confirmation"> Confirmação da Senha</label>
                        <input type="text" password="assword_confirmation" id="assword_confirmation" class="from-control" >
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"> Salvar </button>
            </form>
        </div>
    </div>
</div>
@endsection