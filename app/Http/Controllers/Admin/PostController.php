<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {


	public function index() {

		$parentId = 0;
		$categories = Category::all();

		$posts = Post::paginate(15);

		return view( 'admin.posts.index', [
			'posts' => $posts
		] );
	}


	public function index_list( Request $request, $any, $slug, $sub_slug = NULL ) {

		$segments =	explode( '/', $any);
		$cats = Category::whereIn( 'slug', $segments)->get();

		if($cats->count()==count($segments)) {
			$cat = $cats->where( 'slug', end($segments))->first();
		} else {
			abort( 404 );
		}

		$categories = Category::all();

		$posts = Post::with( 'category' )->whereIn('id', $this->cats($categories,$cat->id))->paginate(15);
		return view( 'admin.posts.index', [
			'posts' => $posts
		] );
	}



	public function create() {
		return view('admin.posts.create', [
			'category'   => [],
			'categories' => Category::with('children')->where('parent_id', '0')->get(),
			'delimiter'  => ''
		]);
	}

	public function store(Request $request) {
		$data = $request->all();
//		request()->validate([
//			'title' => 'required',
//			'slug' => 'required|unique:categories,slug',
//		]);

		Post::create([
			'user_id'    => Auth::id(),
			'cat_id'     => $data['cat_id'],
			'title'      => $data['title'],
			'content'    => $data['content'],
			'published'  => $data['published']
		]);
		return redirect()->route('admin.posts.index')
		                 ->with('success','Новость успешно опубликована!');
	}










	public function posss( $categories, $parentId ) {
		$cat=[$parentId];
		$childCat = $categories->where('parent_id',$parentId);
		foreach ( $childCat as $category ) {
			$cat = array_merge($cat,$this->cats($categories,$category->id));
		}
		return $cat;
	}


	public function cats( $categories, $parentId ) {
		$cat=[$parentId];
		$childCat = $categories->where('parent_id',$parentId);
		foreach ( $childCat as $category ) {
			$cat = array_merge($cat,$this->cats($categories,$category->id));
		}
		return $cat;
	}


//	public function index_list( Request $request, $slug ) {
//
//		$posts = Post::whereHas( 'category', function ( $query ) use ( $slug ) {
//			$query->where( 'slug', $slug );
//		} )->get();
//
//		return view( 'posts.index', [
//			'posts' => $posts
//		] );
//	}


//	public function index_cat(Request $request, $slug)
//	{
//		$news = News::whereHas('category', function ($query) use ($slug) {
//			$query->where('slug', $slug);
//		})->get();
//
//		return view( 'news.index', [
//			'news_list' => $news
//		] );
//	}
//
//	public function go() {
//
//	}
//
}
