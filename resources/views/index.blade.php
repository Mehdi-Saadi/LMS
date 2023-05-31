@extends('layouts.app')

@section('title', ' - Dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">Dashboard</div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        @if($errors->any())
                            <div class="alert alert-danger m-1 pb-0 d-flex justify-content-center" style="max-width: 300px">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="row mb-3">
                        <div class="col-md mb-3">
                            <div class="card">
                                <a href="{{ route('authors') }}" class="btn">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $authors }}</h5>
                                        <p class="card-text">Authors</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <div class="card">
                                <a href="{{ route('publishers') }}" class="btn">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $publishers }}</h5>
                                        <p class="card-text">Publishers</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="card">
                                <a href="{{ route('categories') }}" class="btn">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $categories }}</h5>
                                        <p class="card-text">Categories</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md mb-3">
                            <div class="card">
                                <a href="{{ route('books') }}" class="btn">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $books }}</h5>
                                        <p class="card-text">Books</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <div class="card">
                                <a href="{{ route('users') }}" class="btn">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $users }}</h5>
                                        <p class="card-text">Users</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="card">
                                <a href="{{ route('bookIssues') }}" class="btn">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $bookIssues }}</h5>
                                        <p class="card-text">Book Issues</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
