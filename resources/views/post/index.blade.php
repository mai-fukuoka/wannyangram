@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

@foreach($posts as $post)
    <div class="col-md-8 col-md-2 mx-auto">
    <div class="card-wrap">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <a class="no-text-decoration" href="/users/{{$post->user->id}}">
                    @if($post->user->profile_photo)
                    <img class="post-profile-icon round-img"  src="{{ $post->user->profile_photo }}">
                    @else
                    <img class="post-profile-icon round-img"  src="{{asset('/images/blank_profile.png')}}">
                    @endif
                </a>
                 
            {!! link_to_route('users.show',$post->user->name,['user'=>$post->user->id]) !!}
        </div>
          <img class="img-fluid" src="{{ $post->caption }}">
          @if ($post->user->id == Auth::user()->id)
              <a class="ml-auto my-2" href="/posts/{{ $post->id }}" method="delete">
                <div class="delete-post-icon">
                </div>
          	  </a>
          @endif
            </div>
            <div class="card-body">
          <div class="row parts">
               @if (Auth::user()->is_like($post->id))
                {!! Form::open(['route' => ['likes.unlike', $post->id], 'method' => 'delete']) !!}
                <button class="button-outline" type="submit"><img class="loved" src="images/parts7.png"></button>
                {!! Form::close() !!}
                @else
                {!! Form::open(['route' => ['likes.like', $post->id], 'method' => 'post']) !!}
                <button class="button-outline" type="submit"><img class="loved" src="images/parts5.png"></button>
                {!! Form::close() !!}
              @endif
              <a class="comment"></a>
             </div>
            <div class="comment-post">
                @include('post.comment_list')
            </div>
            <div class="row">
                <form class="w-100 new-comment" action="/posts/{{$post->id}}/comments" method="post">
                    @csrf 
                    <input value="{{Auth::user()->id}}" type="hidden" name="user_id"/>
                    <input value="{{$post->id}}" type="hidden" name="post_id"/>
                    <input class="form-control" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
                </form>
            </div>
        

          <div>
          </div>
        </div>
        </div>
    </div>
    </div>
@endforeach
{{ $posts->links() }}
@endsection