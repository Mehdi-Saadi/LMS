@extends('layouts.app')

@section('title', ' - Book Issues')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">Book Issues</div>

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

                    <!-- save new book issue -->
                    <div class="d-flex justify-content-center">
                        <div class="col" style="max-width: 760px">
                            <form action="{{ route('storeBookIssue') }}" method="post">
                                @csrf
                                <div class="mt-4 mb-2 mx-5">
                                    <div class="row mb-4">
                                        <label for="user" class="form-label">User:</label>
                                        <select class="form-select" id="user" name="user_id">
                                            <option disabled selected>Select Name</option>
                                            @foreach($users as $number => $user)
                                                <option value="{{ $user->id }}">{{ ++$number . ': ' . $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="book" class="form-label">Book:</label>
                                        <select class="form-select" id="book" name="book_id[]" multiple>
                                            <option disabled selected>Select Name</option>
                                            @foreach($books as $number => $book)
                                                <option value="{{ $book->id }}">{{ ++$number . ': ' . $book->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm p-4">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- saved bookIssues -->
                    @foreach($bookIssues as $number => $bookIssue)
                        <div class="row py-3 px-4 mx-0 @if($number % 2 == 0) bg-secondary bg-opacity-10 @endif">
                            <div class="col-md-5 m-3"><span class="fw-bolder">{{ ++$number }}: </span><span class="ps-2">{{ $bookIssue->student_name }}</span></div>
                            <div class="col-md-4 m-3"><span class="ps-2">{{ $bookIssue->book_name }}</span></div>
                            <!-- edit author -->
                            <div class="col-md-1 ms-3 p-2">
                                <a href="{{ route('bookIssueDetails', $bookIssue->id) }}" class="btn btn-secondary">View</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
