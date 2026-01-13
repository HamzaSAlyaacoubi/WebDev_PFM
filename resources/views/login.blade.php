@extends('layout')
@section('title' , 'Login')
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
    <form action="{{route('login.post')}}" method="post">
        @csrf
        <br><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" require>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" require>
        <br>
        <button type="submit">Login</button>
    </form>
    <p>D'ont have account <a href="{{route('registration')}}">Register Now</a></p>
</div>
@endsection