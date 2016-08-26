<?php

namespace App;

use App\Model\BaseModel;

class Vote extends BaseModel
{
	protected $table = 'votes';

	public function post() {
		return $this->belongsTo(Post::class);
	}

	public function user(){
		return $this->belongsTo(User::class);
	}
}
