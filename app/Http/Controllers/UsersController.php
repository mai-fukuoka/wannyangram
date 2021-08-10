<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function __contrust()
    {
        $this>middleware('auth');
    }
    
    public function show($id)
    {
        $user=User::findOrFail($id);
        
        return view('users.show', ['user'=>$user,
        ]);
    }
    
    public function edit($id)
    {
        $user=User::findOrFail($id);
        
        return view('users.edit', [
            'user'=>$user,
            ]);
    }
    
    public function update(Request $request, $id)
    {
        $rules=[
            'name'=>['required','string'],
            'email'=>['email'],
            'password'=>['required','confirmed']
                ];
                
        $this->validate($request, $rules);
        
        
        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        
        return view('users.show', [
            'user'=>$user,
            ]);
    }
    
    public function upload(Request $request)
    {
        $user=\Auth::user();
        $file = $request->file('file');
        $path = Storage::disk('s3')->put('/', $file, 'public');
        $user->profile_photo = Storage::disk('s3')->url($path);
        $user->save();
        return view('users.show', [
            'user'=>$user,
            ]);
    }

    public function disp()
    {
        $path = Storage::disk('s3')->url('hoge.jpg');
        return view('disp', compact('path'));
    }
    
    public function likes($id)
    {
        // idの値でユーザを検索して取得
        $user= User::findOrFail($id);

        // ユーザのお気に入り一覧を取得
        $posts = $user->likes()->orderBy('created_at', 'desc')->paginate(10);

       
        // お気に入り一覧ビューでそれらを表示
        return view('users.likes', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
