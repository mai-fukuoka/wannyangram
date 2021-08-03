@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


@if(Auth::check())
{{-- ログアウトのリンク --}}
<p>{!! link_to_route('logout.get', 'ログアウト') !!}</p>

@endif

<a href="#" class="btn btn-primary">仮のボタンです</a>

@endsection