@extends('partials.layout')

@section('content')

@include('partials.menu')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1> LaraBlog - Posts</h1>
            @if($post->id)
                <a href="{{route('posts.index')}}" class="btn success"> Gerenciar Opções</a>
            @endif

        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            @include('partials.errors')
            
            @if($post->id)
            <form action="{{route('posts.update', ['id' => $post->id])}}" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}}
            @else
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @endif

                {{csrf_field()}}
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="title">Título</label>
                        <input name="title" id="title" rows="5" class="form-control"  value='{{$post->title}}' placeholder="Digite o título do seu post"> </input>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="text"> Texto </label>
                        <textarea name="text" id="text" rows="5" class="form-control" placeholder="Digite o texto do seu post"> {{$post->text}} </textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="text"> Sumário </label>
                        <textarea name="summary" id="summary" rows="5" class="form-control" placeholder="Digite o sumário seu post"> {{$post->summary}} </textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0"> Selecione..</option>
                            @foreach($categories as $category)

                                @if($category->id == $post->category_id)
                                    <option value="{{$category->id}}" selected> {{ $category->name}}</option>
                                @else
                                    <option value="{{$category->id}}"> {{ $category->name}}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="image">Imagem (para manter a imagem antiga, não selecione nenhum arquivo!)</label>
                        <input type="file" name="image" id="image" class="file-control">

                    </div>
                </div>
                <button type="submit" class="btn btn-primary"> Salvar </button>
            </form>
        </div>
    </div>
</div>
@endsection