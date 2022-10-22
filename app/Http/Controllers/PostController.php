<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index () {
        // $posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->get();
        // $posts = Post::orderBy('created_at', 'asc')->get();
        // $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        // $posts = Post::where('status', true)
        //                 ->orderBy('created_at', 'desc')
        //                 ->take(4)
        //                 ->get();
        // $posts = Post::latest()->get();
        // $posts = Post::oldest()->get();
        //todo: 3-4 way  

        $posts = Post::latest()->paginate(4);

        return view('post.index', compact('posts'));
        
    }
    public function create () {
        return view('post.create');
    }
    public function store (Request $request) {
        //validate the request
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //Initiate new object
        // $post = new Post;

        //assign value to the initiated object
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->visit = 0;

        //save the object to the DB
        // $post->save();

        // Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'visit' => 0
        // ]);

        Post::create($request->all());

        return redirect()->route('post.index');

    }
    public function destroy ($id) {
        // $post = Post::find($id);
        // $post->delete();

        Post::find($id)->delete();

        return redirect()->route('post.index');
    }
}
