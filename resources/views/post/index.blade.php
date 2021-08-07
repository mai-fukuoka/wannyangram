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
            </div>
        </div>
    </div>
    </div>
@endforeach
@endsection