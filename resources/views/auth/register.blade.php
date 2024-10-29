<!-- resources/views/auth/register.blade.php -->

@extends('backend.main')

@section('content')
<div class="container">


@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- show error msg -->
@if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- show validation error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h3 class="text-center">Register</h3>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Name" >
                        </div>
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" >
                        </div>
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="form-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" >
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" >
                        </div>
                        @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="form-group text-center mb-3">
                            <input type="submit" value="Register" class="btn btn-primary">
                        </div>
                    </form>
                    <a href="{{route('login')}}">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection