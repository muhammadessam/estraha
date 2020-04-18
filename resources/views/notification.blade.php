@extends('layouts.layout')
@section('content')


<title>Documentation</title>

    <h1>Notifications</h1>

    @foreach(Auth::user()->unreadNotifications as $notification)


    @endforeach

@stop