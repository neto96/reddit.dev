<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function showWelcome() {
		return view('welcome');
	}

	public function rollDice($guess) {
		$randomDice = rand(1, 6);
		$data = [
			'randomDice' => $randomDice,
			'guess' => $guess
		];
		return view('roll-dice', $data);
	}

	public function increment($number = 0) {
		$data = [
			'number' => $number
		];
		return view('increment', $data);
	}

	public function uppercase($name) {
		$data = [
			'name' => $name,
			'uppercase' => strtoupper($name)
		];
		return view('uppercase', $data);
	}
}
