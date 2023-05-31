@extends('layouts.app')

@section('title', ' - Users')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">Users</div>

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

                    <!-- save new user -->
                    <div class="d-flex justify-content-center">
                        <div class="col" style="max-width: 760px">
                            <form action="{{ route('storeUser') }}" method="post">
                                @csrf
                                <div class="mt-4 mb-2 mx-5">
                                    <div class="row mb-4">
                                        <input type="text" name="name" placeholder="New User..." class="form-control" autocomplete="off">
                                    </div>
                                    <div class="row mb-4">
                                        <input type="text" name="address" placeholder="Address..." class="form-control" autocomplete="off">
                                    </div>
                                    <div class="row mb-4">
                                        <input type="email" name="email" placeholder="Email..." class="form-control" autocomplete="off">
                                    </div>
                                    <div class="row mb-4">
                                        <input type="text" name="phone" placeholder="Mobile Phone..." class="form-control" autocomplete="off">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm p-4">
                                            <div class="d-flex justify-content-center">
                                                <label class="form-check pe-2">Gender: </label>
                                                <div class="form-check pe-2">
                                                    <input class="form-check-input" type="radio" name="gender" value="male" id="male">
                                                    <label class="form-check-label" for="male">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check pe-2">
                                                    <input class="form-check-input" type="radio" name="gender" value="female" id="female">
                                                    <label class="form-check-label" for="female">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
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
                    <!-- saved users -->
                    @foreach($users as $number => $user)
                        <div class="row py-3 px-4 mx-0 @if($number % 2 == 0) bg-secondary bg-opacity-10 @endif">
                            <div class="col-md-7 m-3"><span class="fw-bolder">{{ ++$number }}: </span><span class="ps-2">{{ $user->name }}</span></div>
                            <!-- edit author -->
                            <div class="col-md-2 ms-3 p-2">
                                <a href="{{ route('userDetails', $user->id) }}" class="btn btn-secondary">View</a>
                            </div>
                            <!-- delete the user -->
                            <div class="col-md-1 ms-3 p-2">
                                <form action="{{ route('deleteUser', $user->id) }}" method="post">
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
