@extends('backend.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h3 class="text-center">Dashboard</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5>Total Users</h5>
                                    <h1>{{ \App\Models\User::count() }}</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Additional admin-only data -->
                        @if(Auth::user()->usertype === 'admin')
                        <div class="col-md-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5>Total Admins</h5>
                                    <h1>{{ \App\Models\User::where('usertype', 'admin')->count() }}</h1>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <h5>User Details</h5>
                                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                    <p><strong>User Type:</strong> {{ Auth::user()->usertype }}</p>
                                </div>
                            </div>
                        </div>
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
