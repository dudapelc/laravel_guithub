@extends('partials.layout')

@section('content')

@include('partials.menu')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>LaraBlog</h1>
            <p class="lead">Listagem das 3 últimas postagens</p>
        </div>
    </div>
    <div class="container">
    <div class="row mt-3">
        <div class="col-12">
    <table class="table table-hover table-bordered">
                <tr>
                    <th> ID </th>
                    <th> Título </th>
                    <th> Categoria </th>
                    <th> Texto </th>
                    <th> Sumário </th>
                    <th> Data de Criação </th>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <td> {{ $post->id }}</td>
                        <td> {{ $post->title }}</td>
                        <td> {{ $post->category->name }}</td>
                        <td> {{ $post->text }}</td>
                        <td> {{ $post->summary }}</td>
                        <td> {{ $post->created_at }}</td>
                    </tr>
                    
                @endforeach
            </table>
            </div>
    </div>
</div>
</div>
@endsection
