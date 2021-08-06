@extends('layouts.app')

@section('content')

<div class="mt-5 edit-profile-wrapper">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="profile-form-wrap">
          
          <div class="form-group">
            <form action="/upload" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="file">
                <button type="submit">保存</button>
            </form>
            {!! Form::model($user,['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
          <div class="form-group">
              {!! Form::label(' name', '名前:') !!}
              {!! Form::text('name', null, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('email', 'メールアドレス:') !!}
              {!! Form::text('email', null, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('password', 'パスワード:') !!}
              {!! Form::password('password', null, ['class' => 'form-control']) !!}

          <div class="form-group">
              {!! Form::label('password', 'パスワードの確認:') !!}
              {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
          </div>

            {!! Form::submit('変更する', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
      </form>
    </div>
  </div>
</div>
@endsection

