<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;

class StoryController extends Controller {



    public function index() {

        $posts = Story::paginate(15);
        return view('main.content.story.index', compact('posts'));
    }


    public function create() {
        return view('main.content.story.create');
    }


    public function store(Request $request) {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        Story::create($request->all());
        return redirect()->route('articles.index')
            ->with('success','Article created successfully');
    }


    public function show(Request $request, $id) {

        $post = Story::find($id);
        Event::fire('main.content.story.view', $post);

        return view('main.content.story.view',compact('post'));
    }


    public function edit($id) {
        $article = Article::find($id);
        return view('articles.edit',compact('article'));
    }


    public function update(Request $request, $id) {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        Story::find($id)->update($request->all());
        return redirect()->route('articles.index')
            ->with('success','Article updated successfully');
    }


    public function destroy($id)
    {
        Story::find($id)->delete();
        return redirect()->route('articles.index')
            ->with('success','Article deleted successfully');
    }
}
