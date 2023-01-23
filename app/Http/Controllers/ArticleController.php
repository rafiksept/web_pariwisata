<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ArticleController extends Controller
{
    public function createArticle(){
        return view('article');
    }
}
