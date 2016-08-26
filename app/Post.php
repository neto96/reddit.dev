<?php

namespace App;

use App\Model\BaseModel;

class Post extends BaseModel
{
    public static $rules =
		[
			'title' => 'required|max:100',
			'url' => 'required|url'
		];

	public function user() {
		return $this->belongsTo(User::class, 'created_by');
	}

	public static function orderDesc($item) {
		return  Post::with('user')->orderBy('created_at', 'desc')->paginate($item);
	}

	public function votes() {
		return $this->hasMany(Vote::class);
	}

	public function upvotes() {
		return $this->votes()->where('vote', '=', 1);
	}

	public function downvotes() {
		return $this->votes()->where('vote', '=', 0);
	}

	public function voteScore() {
		$upvotes = $this->upvotes()->count();
		$downvotes = $this->downvotes()->count();
		return $upvotes - $downvotes;
	}

	public function userVote($user) {
		$this->votes()->where('user_id', '=', $user->id)->first();
	}
}
