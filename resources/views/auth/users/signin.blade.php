@extends('layouts.master')

@section('title')
    Sign Up

@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-offset-3">
            <h3>Sign In</h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label class="control-label col-md-2 " for="email">Your E-mail</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}" >
                    </div>

                </div>

                <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label class="control-label col-md-2" for="password">Password</label>
                    <div class="col-md-4">
                        <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}" >
                    </div>

                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                {{ csrf_field() }}

            </form>

        </div>
    </div>


@endsection