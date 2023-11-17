@extends('admin.layouts.master')

@section('content')
<div class="row mt-5 justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Send Mail</h3>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="select">Select</label>
                        <select name="" class="form-control" id="mail">
                            <option value="0">Mail to all staff</option>
                            <option value="1">Choose Department</option>
                            <option value="2">Choose Person</option>
                        </select>
                        <br>
                        <select name="" class="form-control" id="department">
                            @foreach(App\Models\Department::all() as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>    
                            @endforeach
                        </select>
                        <br>
                        <select name="" class="form-control" id="person">
                            @foreach(App\Models\User::all() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>    
                            @endforeach
                        </select>
                        <br>
                        {{-- <select name="" class="form-control" id="role">
                            @foreach(App\Models\Role::all() as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>    
                            @endforeach
                        </select> --}}
                        <div class="form-group">
                            <label for="">Body</label>
                            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="" cols="30" rows="10"></textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">File</label>
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-control">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    #department{
        display: none;
    }
    #person{
        display: none;
    }
</style>
@endsection