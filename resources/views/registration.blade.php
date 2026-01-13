@extends('layout')
@section('title' , 'Registration')
@section('content')

<div class="container">
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div>{{$error}}</div>
    @endforeach
    @endif
    @if(session()->has('error'))
    <div>{{session('error')}}</div>
    @endif
    @if(session()->has('success'))
    <div>{{session('success')}}</div>
    @endif
    <form action="{{route('registration.post')}}" method="post">
        @csrf
        <br><br>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" require>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" require>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" require>
        <br>
        <button type="submit">Register</button>
    </form>
    <a href="{{route('login')}}">I have an account</a>
</div>
@endsection