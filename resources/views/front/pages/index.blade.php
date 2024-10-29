@extends('backend.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h3 class="text-center">User Profile</h3>
                    <div class="text-center">
                        <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                    </div>
                    <div class="card-text">
                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>User Type:</strong> {{ Auth::user()->usertype }}</p>
                    </div>
                    <div class="text-center">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection