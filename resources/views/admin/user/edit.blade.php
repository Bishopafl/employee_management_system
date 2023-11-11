@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Create User</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                Edit Employee
            </li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif
            <form action="{{ route('users.update', [$user->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">General Information</div>
                            <div class="card-body">
                                <div class="form-row">
                                        <label for="inputFirstName">Full Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $user->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Street Address</label>
                                        <input type="text" name="address" class="form-control" id="inputaddress4"
                                        value="{{ $user->address }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Mobile Number</label>
                                        <input type="text" name="mobile_number" class="form-control"
                                            id="inputMobileNumber" value="{{ $user->mobile_number }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDesignation">Designation</label>
                                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="inputDesignation"
                                    value="{{ $user->designation }}">
                                        @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDepartment">Department</label>
                                    <select class="form-control" name="department_id">
                                        {@foreach($allDepartments as $dept)
                                            <option value="{{ $dept->id }}"
                                                @if($user->department_id == $dept->id)
                                                    selected
                                                @endif>{{ $dept->name }}
                                            </option>
                                        @endforeach                                        
                                    </select>

                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputStartDate">Start date</label>
                                        <input type="" name="start_from" class="form-control @error('start_from') is-invalid @enderror" id="datepicker"
                                            value="{{ $user->start_from }}" required="">
                                            @error('start_from')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputImage">Image</label>
                                        <input type="file" accept="image/*" name="image" class="form-control @error('image') is-invalid @enderror" id="">
                                        @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Login Information</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required="" value="{{ $user->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Role</label>
                                    <select class="form-control" name="role_id" name="role_id" required="">
                                        @foreach($allRoles as $roleOption)
                                            <option value="{{ $roleOption->id }}"
                                                @if($user->role_id == $roleOption->id)
                                                    selected
                                                @endif>{{ $roleOption->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>   
                        </div>
                        @if (isset(auth()->user()->role->permission['name']['user']['can-edit']))
                            <button type="submit" class="btn btn-primary mt-4">Update User</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection