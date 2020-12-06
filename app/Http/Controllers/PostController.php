<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Validator;

use App\Http\Controllers\Controllers;
use App\Post;
use App\Category;

class PostController extends Controller {

    public function index(){
        $posts = Post::all();

        return view('posts', [
            'posts' => $posts
        ]);
    }

    public function create(){
        $posts = new Post();

        $categories = Category::all();

        return view('post', [
            'post' => $posts,
            'categories' => $categories
        ]);
    }

    public function store(request $request){
        $rules = [
            'title' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
            'text' => 'required|min:3|max:1000',
            'summary' => 'required|min:3'
            
        ];

        $messages = [
            'title.required' => 'O campo título deve ser preenchido',
            'title.min' => 'O campo título deve ser preenchido com pelo menos 3 caracteres',
            'category_id.required' => 'Uma categoria deve ser selecionada',
            'category_id.exists' => 'Você deve selecionar uma categoria válida',
            'text.required' => 'O campo texto deve ser preenchido',
            'text.min' => 'O campo texto deve ser preenchido com pelo menos 3 caracteres',
            'text.max' => 'O campo texto deve ser preenchido com no máximo 1000 caracteres',
            'summary.required' => 'O campo sumário deve ser preenchido',
            'summary.min' => 'O campo sumário deve ser preenchido com pelo menos 3 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()-withErrors($validator)->withInput();
        }

        $posts = new Post();
        $posts->category_id = $request->input('category_id');
        $posts->title = $request->input('title');
        $posts->text = $request->input('text');
        $posts->summary = $request->input('summary');



        if($request->hasFile('image')){

            $filename = uniqid().".".$request->file('image')-extension();
            $path = $request->file('image')-storeAs('public/posts', $filename);
            $posts->url_image = $filename;

        }else {
            $posts->url_image = "";
        }

        $posts->save();

        return redirect()->route('posts.index');
    }

    public function edit($id){
        $post = Post::find($id);

        $categories = Category::all();

        return view('post', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(request $request, $id){
        $rules = [
            'title' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
            'text' => 'required|min:3|max:1000',
            'summary' => 'required|min:3'
            
        ];

        $messages = [
            'title.required' => 'O campo título deve ser preenchido',
            'title.min' => 'O campo título deve ser preenchido com pelo menos 3 caracteres',
            'category_id.required' => 'Uma categoria deve ser selecionada',
            'category_id.exists' => 'Você deve selecionar uma categoria válida',
            'text.required' => 'O campo texto deve ser preenchido',
            'text.min' => 'O campo texto deve ser preenchido com pelo menos 3 caracteres',
            'text.max' => 'O campo texto deve ser preenchido com no máximo 1000 caracteres',
            'summary.required' => 'O campo sumário deve ser preenchido',
            'summary.min' => 'O campo sumário deve ser preenchido com pelo menos 3 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()-withErrors($validator)->withInput();
        }

        $posts = Post::find($id);
        $posts->category_id = $request->input('category_id');
        $posts->title = $request->input('title');
        $posts->text = $request->input('text');
        $posts->summary = $request->input('summary');


        if($request->hasFile('image')){

            $filename = uniqid().".".$request->file('image')-extension();
            $path = $request->file('image')-storeAs('public/posts', $filename);
            $posts->url_image = $filename;

        }else {
            $posts->url_image = "";
        }

        $posts->save();

        return redirect()->route('posts.index');
    }


    public function destroy($id){
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}

