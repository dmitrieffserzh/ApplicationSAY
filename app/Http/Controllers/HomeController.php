<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function __construct() {
        // $this->middleware('auth');
    }


	public function index() {

		$post = Post::take(5)->get();
		$hot_posts = Post::take(5)->get();


		return view('home', [
			'posts' => $post,
			'hot_posts' => $hot_posts
		]);
	}
}
