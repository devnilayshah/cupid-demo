@extends('layouts.auth')

@section('title')
Login
@endsection

@section('content')

<div class="col-10 offset-1 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
    <div class="div-to-align">
        <div class="">
            <form class="text-center border border-light p-5" name="login_form" id="login_form" method="POST" action="{{ route('login.store') }}">
                @csrf
                <p class="h4 mb-4">Cupid Knot</p>
                <input type="email" id="email_id" name="email_id" class="form-control mb-4" placeholder="E-mail">
                @error('email_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password">
                <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>
                <p>Not a member?
                    <a href="{{ route('register') }}">Register</a>
                </p>                                
                <p>or sign in with:</p>
                <a href="{{ route('google') }}" class="mx-2" role="button"><i class="fab fa-google light-blue-text"></i></a>
            </form>                         
        </div>
    </div>
</div>


@endsection