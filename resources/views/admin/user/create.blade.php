@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Create User</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                Register Employee
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
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">General Information</div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputFirstName">First Name</label>
                                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                            placeholder="First name">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <label for="inputLastName">Last Name</label>
                                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                                            placeholder="Last name">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Street Address</label>
                                        <input type="text" name="address" class="form-control" id="inputaddress4"
                                            placeholder="ex: 123 Street Road">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Mobile Number</label>
                                        <input type="text" name="mobile_number" class="form-control"
                                            id="inputMobileNumber" placeholder="Mobile Number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDesignation">Designation</label>
                                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="inputDesignation"
                                        required="">
                                        @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDepartment">Department</label>
                                    <select class="form-control" name="department_id" name="department_id" id="">
                                        <option selected>Choose...</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputStartDate">Start date</label>
                                        <input type="" name="start_from" class="form-control @error('start_from') is-invalid @enderror" id="datepicker"
                                            placeholder="mm-dd-yyy" required="">
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
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required="">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="email">Role</label>
                                    <select class="form-control" name="role_id" name="role_id" required="">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>   
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Create User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection