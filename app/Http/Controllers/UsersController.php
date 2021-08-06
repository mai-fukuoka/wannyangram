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
        
        return redirect('/');
    }
    
    public function upload(Request $request)
    {
        $file = $request->file('file');
        // 第一引数はディレクトリの指定
        // 第二引数はファイル
        // 第三引数はpublickを指定することで、URLによるアクセスが可能となる
        $path = Storage::disk('s3')->put('/', $file, 'public');
        // hogeディレクトリにアップロード
        // $path = Storage::disk('s3')->putFile('/hoge', $file, 'public');
        // ファイル名を指定する場合はputFileAsを利用する
        // $path = Storage::disk('s3')->putFileAs('/', $file, 'hoge.jpg', 'public');
        return redirect('/');
    }

    public function disp()
    {
        $path = Storage::disk('s3')->url('hoge.jpg');
        return view('disp', compact('path'));
    }
}
