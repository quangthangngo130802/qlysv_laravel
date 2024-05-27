<?php

namespace App\Http\Controllers\Qldt;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function form()
    {
        $post = Posts::orderBy('posts_id', 'DESC')->get();
        return view('Qldt.post', compact('post'));
    }
    public function postDetail($id)
    {
        $post = Posts::where('posts_id', $id)->first();
        return view('Qldt.postDetail', compact('post'));
    }
}
