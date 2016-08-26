<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Post;
use App\User;

class UserController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$user = User::find($id);
		if (!$user) {
			abort(404);
		}
		$post = Post::where('created_by', $id)->orderBy('created_at')->get();
		
		$data = [
			'user' => $user,
			'posts' => $post
		];
        return view('user.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$user = User::find($id);
		if (!$user) {
			abort(404);
		}
		return view('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		session()->flash('fail', 'Your information was NOT updated. Please fix errors.');
		$v = Validator::make($request->all(), User::$updateRules);
		$v->sometimes('email', 'required|email|max:244|unique:users', function($input) use($id) {
			return User::find($id)->email !== $input->email;
		});
		if ($v->fails()) {
			return redirect()->back()->withInput()->withErrors($v);
		}
		$user = User::find($id);
		if (!$user) {
			abort(404);
		}

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->save();
		session()->flash('success', 'Your information was updated successfully!');
		return redirect()->action('UserController@index', $user->id);

	}

	public function editPassword($id)
	{
		$user = User::find($id);
		if (!$user) {
			abort(404);
		}
		return view('user.password')->with('user', $user);
	}

    public function updatePassword(Request $request, $id) {
		session()->flash('fail', 'Your password was NOT updated. Please fix errors.');
    	$this->validate($request, User::$passwordRules);
    	$user = User::find($id);
		if (!$user) {
			abort(404);
		}
    	$user->password = Hash::make($request->input('password'));
		$user->save();
		session()->flash('success', 'Your password was updated successfully!');
		return redirect()->action('UserController@index', $user->id);
	}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$user = User::find($id);
		$user->delete();
		$post = Post::where('created_by', $id)->orderBy('created_at');
		$post->delete();
		session()->flash('success', 'Your account was deleted successfully!');
		return redirect()->action('PostsController@index');
    }
}
