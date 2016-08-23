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
}
