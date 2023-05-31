@extends('layouts.app')

@section('title', ' - Books')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">Books</div>

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

                    <!-- save new book -->
                    <div class="d-flex justify-content-center">
                        <div class="col" style="max-width: 760px">
                            <form action="{{ route('storeBook') }}" method="post">
                                @csrf
                                <div class="mt-4 mb-2 mx-5">
                                    <div class="row mb-4">
                                        <input type="text" name="name" placeholder="New Book..." class="form-control" autocomplete="off">
                                    </div>
                                    <div class="row mb-4">
                                        <label for="publisher" class="form-label">Publisher:</label>
                                        <select class="form-select" id="publisher" name="publisher_name">
                                            <option disabled selected>Select Publisher</option>
                                            @foreach($publishers as $number => $publisher)
                                                <option value="{{ $publisher->name }}">{{ ++$number . ': ' . $publisher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="author" class="form-label">Author:</label>
                                        <select class="form-select" id="author" name="author_name[]" multiple>
                                            <option disabled selected>Select Author</option>
                                            @foreach($authors as $number => $author)
                                                <option value="{{ $author->name }}">{{ ++$number . ': ' . $author->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="category" class="form-label">Category:</label>
                                        <select class="form-select" id="category" name="category_name[]" multiple>
                                            <option disabled selected>Select Category</option>
                                            @foreach($categories as $number => $category)
                                                <option value="{{ $category->name }}">{{ ++$number . ': ' . $category->name }}</option>
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
                    <!-- saved books -->
                    @foreach($books as $number => $book)
                        <div class="row py-3 px-4 mx-0 @if($number % 2 == 0) bg-secondary bg-opacity-10 @endif">
                            <div class="col-md-7 m-3"><span class="fw-bolder">{{ ++$number }}: </span><span class="ps-2">{{ $book->name }}</span></div>
                            <!-- edit author -->
                            <div class="col-md-2 ms-3 p-2">
                                <a href="{{ route('bookDetails', $book->id) }}" class="btn btn-secondary">View</a>
                            </div>
                            <!-- delete the user -->
                            <div class="col-md-1 ms-3 p-2">
                                <form action="{{ route('deleteBook', $book->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
