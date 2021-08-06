@extends('layouts.app')

@section('content')
<div class="profile-wrap">
    <div class="row">
        <div class="col-md-4 text-center">
            @if($user->profile_photo)
            <p>
                <img class="round-img" src="{{$path}}"/>
            </p>
            @else
                <img class="round-img" src="{{asset('/images/blank_profile.png')}}"/>
            @endif
        </div>
        <div class="col-md-8">
    <div class="row">
        <div class="col-sm-12">
        <h1>{{$user->name}}</h1></div>
        @if ($user->id == Auth::user()->id)
        <a class="btn btn-putline-dark common-btn edit-profile-btn" {!! link_to_route('users.edit','プロフィールを編集',[$user->id]) !!}</a>
        <a class="btn btn-outline-dark common-btn edit-profile-btn" {!! link_to_route('logout.get','ログアウト') !!}</a>
    </div>
    @endif
    
    <div class="row">
        <p class="user_name mt-3">{{$user->email}}</p>
    </div>
        </div>
    </div>
</div>

@endsection