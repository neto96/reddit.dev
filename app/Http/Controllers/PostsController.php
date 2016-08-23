<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
    {
    	$posts = Post::with('user')->paginate(4);
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
		session()->flash('fail', 'Your post was NOT created. Please fix errors.');
		$this->validate($request, Post::$rules);


		$post = new Post();
		$post->title = $request->get('title');
		$post->url = $request->get('url');
		$post->content = $request->get('content');
		$post->created_by = Auth::user()->id;
		$post->save();
		session()->flash('success', 'Your post was created succesfully!');
		return redirect()->action('PostsController@index');
	}

    public function show($id)
    {
        $post = Post::find($id);
		if (!$post) {
			abort(404);
		}
		$data = [
			'post' => $post
		];
    	return view('posts.show', $data);
    }

    public function edit($id)
    {
    	$post = Post::find($id);
		if (!$post) {
			abort(404);
		}
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
		session()->flash('fail', 'Your post was NOT updated. Please fix errors.');
		$this->validate($request, Post::$rules);

		$post = Post::find($id);
		if (!$post) {
			abort(404);
		}
		$post->title = $request->input('title');
		$post->content = $request->input('content');
		$post->url = $request->input('url');
		$post->save();
		session()->flash('success', 'Your post was updated succesfully!');
        return redirect()->action('PostsController@show', $post->id);
    }

    public function destroy(Request $request, $id)
    {
		$post = Post::find($id);
		if (!$post) {
			abort(404);
		}
		$post->delete();
		$request->session()->flash('success', 'Your post was deleted succesfully!');
    	return redirect()->action('PostsController@index');
    }
}
