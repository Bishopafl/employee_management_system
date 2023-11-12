@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">

            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            <form action="{{ route('permission.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <select name="role_id" class="form-control @error('role_id')
                            is-invalid
                        @enderror " id="">
                            <option value="">Select Role</option>
                            @foreach ($allRoles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                            @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </select>

                        <table class="table table-dark mt-3">
                            <thead>
                              <tr>
                                <th scope="col">Permission</th>
                                <th scope="col">can-add</th>
                                <th scope="col">can-edit</th>
                                <th scope="col">can-view</th>
                                <th scope="col">can-delete</th>
                                <th scope="col">can-list</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Department</td>
                                <td><input type="checkbox" name="name[department][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[department][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[department][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[department][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[department][can-list]" value="1"></td>
                              </tr>
                              <tr>
                                <td>Role</td>
                                <td><input type="checkbox" name="name[role][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[role][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[role][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[role][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[role][can-list]" value="1"></td>
                              </tr>
                              <tr>
                                <td>Permissions</td>
                                <td><input type="checkbox" name="name[permission][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[permission][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[permission][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[permission][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[permission][can-list]" value="1"></td>
                              </tr>
                              <tr>
                                <td>User</td>
                                <td><input type="checkbox" name="name[user][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[user][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[user][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[user][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[user][can-list]" value="1"></td>
                              </tr>
                              <tr>
                                <td>Approve Leave</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="checkbox" name="name[leave][can-list]" value="1"></td>
                              </tr>
                            </tbody>
                          </table>
                          <button type="submit" class="btn btn-primary">
                            Submit
                          </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
