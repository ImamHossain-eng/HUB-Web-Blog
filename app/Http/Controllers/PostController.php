<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Str, Image;



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

        // $posts = Post::latest()->paginate(4);


        $posts = Post::latest()->get();

        // return $posts;


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
            // 'image' => 'required|mimes:jpg,png|max:2048'
        ]);

        //check if image exist with our request
        if($request->hasFile('image')) {
            //todo
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $fileName = Str::random(25).'.'.$ext;

            //Move file to specific folder : Default option of Laravel for file Upload
            // $file->move(public_path('images/post'), $fileName);
            
            Image::make($file)->resize(400, 400)->save(public_path('images/post/'.$fileName));

 
             //Move file to specific folder
            //  $request->file('image')->move(public_path('images/post'), Str::random(25).'.'.$request->file('image')->getClientOriginalExtension());
            

        } else {
            $fileName = 'no_image.png';
        }

        // Initiate new object 
        $post = new Post;

        // assign value to the initiated object 
        $post->title = $request->title;
        $post->body = $request->body;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->visit = 0;
        $post->image = $fileName;
        // save the object to the DB
        $post->save();

        // Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'visit' => 0
        // ]);

        // Post::create($request->all());

        return redirect()->route('post.index')->with('success', 'Successfully Inserted');

    }
    public function destroy ($id) {
        // $post = Post::find($id);
        // $post->delete();

        Post::find($id)->delete();

        return redirect()->route('post.index')->with('error', 'Successfully Removed');
    }
    public function show ($id) {
        $post = Post::find($id);

        $post->visit = $post->visit + 1;

        $post->save();

        return view('post.show', compact('post'));
    }
    public function edit ($id) {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }
    public function update (Request $request, $id) {
        $this->validate($request, [
            // 'title' => 'required|string|max:191|min:10',
            // 'title' => ['required', 'string', 'max:191', 'min:100'],
            'title' => 'required',    
            'body' => 'required'
        ]);

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->status = $request->input('status');

        $post->save();

        return redirect()->route('post.index')->with('warning', 'Successfully Updated');

    }
}
