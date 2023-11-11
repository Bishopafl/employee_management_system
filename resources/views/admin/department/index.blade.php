@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        All Departments
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                </thead>
                <tbody>
                    @if (count($departments) > 0)
                    @foreach ($departments as $key => $dept)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $dept->name }}</td>
                        <td>{{ $dept->description }}</td>
                        <td>
                            @if (isset(auth()->user()->role->permission['name']['department']['can-edit']))
                                <a href="{{ route('departments.edit', [$dept->id]) }}"><i class="fas fa-edit" h></i></a>
                            @endif
                        </td>
                        <td>
                            @if (isset(auth()->user()->role->permission['name']['department']['can-delete']))
                                <a href="#" data-toggle="modal" data-target="#removeDepartmentModal{{ $dept->id }}"><i class="fas fa-trash"></i></a>
                            @endif
                            <!-- Modal -->
                            <div class="modal fade" id="removeDepartmentModal{{ $dept->id }}" tabindex="-1" role="dialog" aria-labelledby="removeDepartmentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('departments.destroy', [$dept->id]) }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="removeDepartmentModalLabel">Delete Department</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete department: {{ $dept->name }}?
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
                    <td>No Departments to display</td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection