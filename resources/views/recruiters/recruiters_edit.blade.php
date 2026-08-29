@extends('admin.com_layout')

@section('content')
    <h5 class="modal-title" id="settingsModalLabel">
        Edit the HR Details
    </h5>
    <div class="modal-body">
        <form action="{{ route("recruiters.edit_submit") }}" method="post">
            @csrf
            <label for="">Name: </label>
            <input type="text" name="rec_name" class="form-control" value="{{ $recruiter->name }}">
            <label for="">Email: </label>
            <input type="email" name="rec_email" class="form-control" value="{{ $recruiter->email }}">
            <label for="">Password: </label>
            <input type="password" name="rec_password" class="form-control" value="{{ $recruiter->password }}">
            <label for="">Status: </label> <br>
            <input type="radio" name="rec_status" value="Active"  {{ $recruiter->status == 'Active' ? 'checked' : '' }}><span class="text-primary">Active</span>
            <input type="radio" name="rec_status" value="Deactive" {{ $recruiter->status == 'Deactive' ? 'checked' : '' }}><span class="text-danger">Deactive</span>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">
            <span>Done</span>
        </button>
        <button type="reset" class="btn btn-danger">
            Reset
        </button>
    </div>
    </form>

@endsection