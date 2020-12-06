<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controllers;
use App\Post;
use App\Category;

class HomeController extends Controller{
    public function index(){
        $categories = Category::all();

        return view('home', [
            'categories' => $categories
        ]);
    }

    public function page(){
        $posts = Post::where('id', '>', '0')->orderBy('id', 'desc')->limit(3)->get();
        return view('page', [
            'posts' => $posts
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
