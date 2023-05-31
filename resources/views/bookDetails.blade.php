@extends('layouts.app')

@section('title', ' - Book Details')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">Book Details</div>

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

                    <!-- saved book -->
                    <div class="d-flex justify-content-center">
                        <div class="col card" style="max-width: 700px">
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
                            <div class="py-3 px-4 bg-secondary bg-opacity-10">
                                <span class="fw-bold">Status: </span><span class="p-2">@if($book->status == 1) <span class="btn btn-success">Available</span> @else <span class="btn btn-danger">Not Available</span> @endif</span>
                            </div>
                        </div>
                    </div>

                    <!-- edit button -->
                    <div class="d-flex justify-content-center p-4">
                        <button id="button" class="btn btn-secondary" onclick="editBtn()">Edit</button>
                    </div>

                    <!-- edit user -->
                    <div id="editForm" style="display: none">
                        <div class="d-flex justify-content-center" >
                            <div class="col" style="max-width: 760px">
                                <form action="{{ route('editBook', $book->id) }}" method="post">
                                    @csrf
                                    <div class="mt-4 mb-2 mx-5">
                                        <div class="row mb-4">
                                            <input type="text" name="name" placeholder="New Name..." class="form-control" autocomplete="off" value="{{ $book->name }}">
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
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottomScript')
    <script>
        function editBtn() {
            if (document.getElementById('button').innerHTML === 'Edit') {
                document.getElementById('editForm').style.display='block';
                document.getElementById('button').innerHTML='Cancel';
            } else {
                document.getElementById('editForm').style.display='none';
                document.getElementById('button').innerHTML='Edit';
            }
        }
    </script>
@endsection
