@extends('layouts.app')

@section('title', ' - Authors')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">Authors</div>

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

                    <!-- save new author -->
                    <form action="{{ route('storeAuthor') }}" method="post">
                        @csrf
                        <div class="d-flex justify-content-center mx-sm-0 my-5">
                            <input type="text" name="name" placeholder="New Author..." class="form-control w-75 me-5" autocomplete="off">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                    <!-- saved authors -->
                    @foreach($authors as $number => $author)
                        <div class="row py-3 px-4 mx-0 @if($number % 2 == 0) bg-secondary bg-opacity-10 @endif">
                            <div class="col-md-5 p-3"><span class="fw-bolder">{{ ++$number }}: </span><span class="ps-2">{{ $author->name }}</span></div>
                            <div class="col-md-5">
                                <!-- edit author -->
                                <form action="{{ route('editAuthor', $author->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-7 py-2">
                                            <input type="text" name="name" placeholder="Edit Author..." class="form-control" autocomplete="off">
                                        </div>
                                        <div class="col-md-1 py-2">
                                            <button type="submit" class="btn btn-secondary">Edit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- delete the author -->
                            <div class="col-md-1 p-2">
                                <form action="{{ route('deleteAuthor', $author->id) }}" method="post">
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
