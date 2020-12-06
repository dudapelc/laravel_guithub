@extends('partials.layout')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1> LaraBlog </h1>
            <p class="lead"> Blog lara </p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <form action="{{ route('page') }}" method="post">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> Categorias </span>
                            </div>
                            <select name="category" id="category" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
