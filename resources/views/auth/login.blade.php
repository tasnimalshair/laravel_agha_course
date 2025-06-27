@extends('styles.app')

@section('title')
    <h1>Login Page</h1>
@endsection

@section('contents')
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit">Login</button>
    </form>
@endsection
