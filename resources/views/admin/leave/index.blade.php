@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">All Leave Requests</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Request Date From</th>
                                <th scope="col">Request Date To</th>
                                <th scope="col">Description</th>
                                <th scope="col">Leave Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Reply</th>
                                {{-- <th scope="col">Edit</th> --}}
                                <th scope="col">Approve/Reject</th>
                            </tr>
                        </thead>
                        <tbody>
    
                            @foreach ($leaves as $leave)
                            <tr>
                                <th>{{ $leave->user->name }}</th>
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
    
                                <td>{{ $leave->message }}</td>
                                
                                <td>
    
                                    <a href="#" data-toggle="modal"
                                        data-target="#removeLeaveRequestModal{{ $leave->id }}"><i class="fas fa-pencil-alt"></i>
                                    </a>
    
                                    <!-- Modal -->
                                    <div class="modal fade" id="removeLeaveRequestModal{{ $leave->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="removeLeaveRequestModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('accept.reject', [$leave->id]) }}" method="post">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="removeLeaveRequestModalLabel">Confirm Leave</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="statusLabel">Status</label>
                                                            <select class="form-control" name="status" id="">
                                                                <option value="0">Pending</option>
                                                                <option value="1">Accept</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="statusLabel">Status</label>
                                                            <textarea name="message" class="form-control" required=""></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Submit Request</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
