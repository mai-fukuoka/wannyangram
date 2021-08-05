@extends('layouts.app')

@section('content')
{{--ログイン画面--}}
    <div class="text-center">
        <h2 class="logo-img mx-auto"></h2>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route'=>'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email','Email') !!}
                    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'メールアドレス']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password','Password') !!}
                    {!! Form::password('password',['class'=>'form-control','placeholder'=>'パスワード']) !!}
                </div>
                
        <div class="mt-5">
                {!! Form::submit('サインインする',['class'=>'btn btn-outline-danger btn-block']) !!}
        </div>
        {!! Form::close() !!}
            {{--ユーザー登録ページのリンク--}}
            <p class="mt-3 text-center">登録しますか？{!! link_to_route('signup.get','新規登録') !!}</p>
        </div>
    </div>
@endsection