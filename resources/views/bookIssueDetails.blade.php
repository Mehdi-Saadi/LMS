@extends('layouts.app')

@section('title', ' - Book Issue Details')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">Book Issue Details</div>

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

                    <!-- saved user -->
                    <div class="d-flex justify-content-center">
                        <div class="col card mb-2" style="max-width: 700px">
                            <div class="py-3 px-4">
                                <span class="fw-bold">User Details: </span>
                            </div>
                            <div class="py-3 px-4 bg-secondary bg-opacity-10">
                                <span class="fw-bold">Name: </span><span class="p-2">{{ $user->name }}</span>
                            </div>
                            <div class="py-3 px-4">
                                <span class="fw-bold">Address: </span><span class="p-2">{{ $user->address }}</span>
                            </div>
                            <div class="py-3 px-4 bg-secondary bg-opacity-10">
                                <span class="fw-bold">Email: </span><span class="p-2">{{ $user->email }}</span>
                            </div>
                            <div class="py-3 px-4">
                                <span class="fw-bold">Phone: </span><span class="p-2">{{ $user->phone }}</span>
                            </div>
                            <div class="py-3 px-4 bg-secondary bg-opacity-10">
                                <span class="fw-bold">Gender: </span><span class="p-2">{{ $user->gender }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- saved book -->
                    <div class="d-flex justify-content-center">
                        <div class="col card mb-2" style="max-width: 700px">
                            <div class="py-3 px-4">
                                <span class="fw-bold">Book Details: </span>
                            </div>
                            <div class="py-3 px-4 bg-secondary bg-opacity-10">
                                <span class="fw-bold">Name: </span><span class="p-2">{{ $book->name }}</span>
                            </div>
                            <div class="py-3 px-4">
                                <span class="fw-bold">Publisher: </span><span class="p-2">{{ $book->publisher }}</span>
                            </div>
                            <div class="py-3 px-4 bg-secondary bg-opacity-10">
                                <span class="fw-bold">Author: </span><span class="p-2">{{ $book->author }}</span>
                            </div>
                            <div class="py-3 px-4">
                                <span class="fw-bold">Category: </span><span class="p-2">{{ $book->category }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- saved book issue -->
                    <div class="d-flex justify-content-center">
                        <div class="col card mb-5" style="max-width: 700px">
                            <div class="py-3 px-4 bg-secondary bg-opacity-10">
                                <span class="fw-bold">Given At: </span><span class="p-2">{{ $bookIssue->created_at }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('deleteBookIssue', $bookIssue->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
