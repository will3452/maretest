<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('post');
    }
    public function store(Request $request)
    {
       $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg:max:5048',
        ]);

        $image = $request->image->store('public');

        Post::create(['user_id' => auth()->id(), 'title' => $data['title'], 'body' => $data['body'], 'image' => $image]);
        return back()->withSuccess('Post has been added!');
    
    }
}
