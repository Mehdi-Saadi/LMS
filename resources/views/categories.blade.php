@extends('layouts.app')

@section('title', ' - Categories')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">Categories</div>

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

                    <!-- save new category -->
                    <form action="{{ route('storeCategory') }}" method="post">
                        @csrf
                        <div class="d-flex justify-content-center mx-sm-0 my-5">
                            <input type="text" name="name" placeholder="New Category..." class="form-control w-75 me-5" autocomplete="off">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                    <!-- saved categories -->
                    @foreach($categories as $number => $category)
                        <div class="row py-3 px-4 mx-0 @if($number % 2 == 0) bg-secondary bg-opacity-10 @endif">
                            <div class="col-md-5 p-3"><span class="fw-bolder">{{ ++$number }}: </span><span class="ps-2">{{ $category->name }}</span></div>
                            <div class="col-md-5">
                                <!-- edit category -->
                                <form action="{{ route('editCategory', $category->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-7 py-2">
                                            <input type="text" name="name" placeholder="Edit Category..." class="form-control" autocomplete="off">
                                        </div>
                                        <div class="col-md-1 py-2">
                                            <button type="submit" class="btn btn-secondary">Edit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- delete the category -->
                            <div class="col-md-1 p-2">
                                <form action="{{ route('deleteCategory', $category->id) }}" method="post">
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
