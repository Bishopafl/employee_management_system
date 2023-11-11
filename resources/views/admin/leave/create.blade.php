@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Leave Request Form</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                Submit Leave Request
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
            <form action="{{ route('leaves.store') }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Create Leave Request</div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputFrom">From Date</label>
                                        <input type="" name="from"
                                            class="form-control @error('from') is-invalid @enderror" required=""
                                            id="datepicker">
                                        @error('from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="inputLastName">To Date</label>
                                        <input type="" name="to"
                                            class="form-control @error('last_name') is-invalid @enderror"
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
                                        <select class="form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example" name="type" required="">
                                            <option selected>Select Leave Type</option>
                                            <option value="annual_leave">Annual Leave</option>
                                            <option value="sick_leave">Sick Leave</option>
                                            <option value="parental_leave">Parental Leave</option>
                                            <option value="other_leave">Other Leave</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Description</label>
                                    <textarea name="description"
                                        class="form-control @error('description') is-invalid @enderror" cols="30"
                                        rows="10"></textarea>
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

            <div class="request-table mt-5">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Request Date From</th>
                            <th scope="col">Request Date To</th>
                            <th scope="col">Description</th>
                            <th scope="col">Leave Type</th>
                            <th scope="col">Status</th>
                            <th scope="col">Reply</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaves as $leave)
                            
                        @endforeach
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $leave->from }}</td>
                            <td>{{ $leave->to }}</td>
                            <td>{{ $leave->description }}</td>
                            <td>{{ $leave->type }}</td>

                        @if ($leave->status == App\Models\Leave::PENDING)
                            <td class="bg-warning">
                                Pending
                            </td>
                        @else
                            <td class="bg-success">
                                Approved
                            </td>
                        @endif

                            <td>{{ $leave->reply }}</td>
                            <td><a href="{{ route('leaves.edit', [$leave->id]) }}"><i class="fas fa-edit"></i></a></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection