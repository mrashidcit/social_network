@extends('layouts.master')

@section('title')
    Welcom!
@endsection

@section('content')
    @if(count($errors) > 0)
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Your E-mail</label>
                    <input type="text" name="email" id="email" value="{{ Request::old('email') }}" class="form-control">
                </div>
                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="first_name">Your First Name</label>
                    <input type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}" class="form-control">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="{{ Request::old('password') }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {{ csrf_field() }}

            </form>

        </div>

        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Your E-mail</label>
                    <input type="text" name="email" id="email" value="{{ Request::old('email') }}" class="form-control">
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Your E-mail</label>
                    <input type="password" name="password" id="password" value="{{ Request::old('password') }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {{ csrf_field() }}

            </form>

        </div>
    </div>
@endsection