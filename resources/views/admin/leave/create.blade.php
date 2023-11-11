@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Create User</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                Leave Form
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
                            <div class="card-header">Create Leave Time</div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputFrom">From Date</label>
                                        <input type="" name="from" class="form-control @error('from') is-invalid @enderror" required="" id="datepicker">
                                            @error('from')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <label for="inputLastName">To Date</label>
                                        <input type="" name="to" class="form-control @error('last_name') is-invalid @enderror"
                                            id="datepicker1">
                                            @error('to')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col mt-4">
                                        <label for="inputLastName">Type of Leave</label>
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="type" required="">
                                            <option selected>Select Leave Type</option>
                                            <option value="annualLeave">Annual Leave</option>
                                            <option value="sickLeave">Sick Leave</option>
                                            <option value="parentalLeave">Parental Leave</option>
                                            <option value="otherLeave">Other Leave</option>
                                        </select>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="inputDescription">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10"></textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div> 
                                <button type="submit" class="btn btn-primary mt-4">Create Leave Request</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection