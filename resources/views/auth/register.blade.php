@extends('layouts.app')

@section('content')
{{--新規登録--}}
    <div class="text-center">
        <h2 class="logo-img mx-auto"></h2>
    </div>
    
    <div class="form-wrap"></div>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'なまえ']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control','placeholder'=>'メールアドレス']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control','placeholder'=>'パスワード']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control','placeholder'=>'パスワードの確認']) !!}
                </div>
                
        <div class="mt-5">
                {!! Form::submit('登録', ['class' => 'btn btn-outline-danger btn-block']) !!}
            {!! Form::close() !!}
        </div>
             <p class="mt-3 text-center">アカウントをお持ちですか？{!! link_to_route('login','サインインする。') !!}</p>
        </div>
    </div>
    </div>
@endsection    
