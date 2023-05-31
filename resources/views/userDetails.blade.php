@extends('layouts.app')

@section('title', ' - User Details')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">User Details</div>

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
                        <div class="col card" style="max-width: 700px">
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

                    <!-- edit button -->
                    <div class="d-flex justify-content-center p-4">
                        <button id="button" class="btn btn-secondary" onclick="editBtn()">Edit</button>
                    </div>

                    <!-- edit user -->
                    <div id="editForm" style="display: none">
                        <div class="d-flex justify-content-center" >
                            <div class="col" style="max-width: 760px">
                                <form action="{{ route('editUser', $user->id) }}" method="post">
                                    @csrf
                                    <div class="mt-4 mb-2 mx-5">
                                        <div class="row mb-4">
                                            <input type="text" name="name" placeholder="Edit User..." class="form-control" autocomplete="off" value="{{ $user->name }}">
                                        </div>
                                        <div class="row mb-4">
                                            <input type="text" name="address" placeholder="Edit Address..." class="form-control" autocomplete="off" value="{{ $user->address }}">
                                        </div>
                                        <div class="row mb-4">
                                            <input type="email" name="email" placeholder="Edit Email..." class="form-control" autocomplete="off" value="{{ $user->email }}">
                                        </div>
                                        <div class="row mb-4">
                                            <input type="text" name="phone" placeholder="Edit Mobile Phone..." class="form-control" autocomplete="off" value="{{ $user->phone }}">
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
