@extends('layouts.master')

@section('title')
    Sign Up

@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-offset-3">
            <h3>Sign Up</h3>
            <form  action="{{ route('signup') }}" method="post">
                <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label class="control-label col-md-2" for="email">Your E-mail</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}" >
                    </div>


                </div>
                <div class="form-group row {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label class="control-label col-md-2" for="first_name">Your First Name</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}" >
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