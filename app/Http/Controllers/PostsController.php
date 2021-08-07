<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Validator;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $posts = Post::limit(10)
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('post/index', ['posts' => $posts]);
    }
    
    public function new()
    {
        return view('post/new');
    }
    
    public function store(Request $request)
    {
        $post = new Post;
        
        $file = $request->file('file');
        $path = Storage::disk('s3')->put('/', $file, 'public');
        $post->caption = Storage::disk('s3')->url($path);
        $post->user_id = Auth::user()->id;

        $post->save();

        return redirect('/');
    }
    
    public function destroy($id)
    {
        $post=\App\Post::findOrFail($id);
        
        if (\Auth::id()===$post->user_id) {
            $post->delete();
        }
        
        return back();
    }
}
