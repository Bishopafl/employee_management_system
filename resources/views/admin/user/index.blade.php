@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        All Employees
                    </li>
                </ol>
            </nav>

            @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif

            <table id="datatablesSimple" class="table">
                <thead>

                    <tr>
                        <th>SN</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Start Date</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                </thead>
                <tbody>
                    @if (count($users) > 0)
                    @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><img width="100" src="{{ asset('profile') }}/{{ $user->image }}" alt=""></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><span class="badge badge-danger">{{ $user->role->name ?? '' }}</span></td>
                        <td><span class="badge badge-success">{{ $user->department->name ?? '' }}</span></td>
                        <td>{{ $user->designation }}</td>
                        <td>{{ $user->start_from }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->mobile_number }}</td>
                        <td>
                            <a href="{{ route('users.edit', [$user->id]) }}"><i class="fas fa-edit" h></i></a>
                        </td>
                        <td>
                            
                            <a href="#" data-toggle="modal" data-target="#removeUserModal{{ $user->id }}"><i class="fas fa-trash"></i></a>

                            <!-- Modal -->
                            <div class="modal fade" id="removeUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="removeUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('users.destroy', [$user->id]) }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="removeUserModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete <b>user: {{ $user->name }}</b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <td>No Users to display</td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection