<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{

    public function index()
    {
    	$posts = Post::all();
		$data = [
			'posts' => $posts
		];
        return view('posts.index', $data);
    }

    public function create()
    {
		return view('posts.create');
    }

    public function store(Request $request)
    {
		$post = new Post();
		$post->title = $request->get('title');
		$post->url= $request->get('url');
		$post->content = $request->get('content');
		$post->created_by = 1;
		$post->save();

		return redirect()->action('PostsController@index');
    }

    public function show($id)
    {
        $post = Post::find($id);
		$data = [
			'post' => $post
		];
    	return view('posts.show', $data);
    }

    public function edit($id)
    {
        return "Show a form for editing a specific post";
    }

    public function update(Request $request, $id)
    {
    	$post = Post::find($id);
		$post->title = $request->input('title');
		$post->content = $request->input('content');
		$post->url = $request->input('url');
		$post->save();

        return redirect()->action('PostsController@show', $post->id);
    }

    public function destroy($id)
    {
		$post = Post::find($id);
		$post->delete();
    	return "Delete a specific post";
    }
}
