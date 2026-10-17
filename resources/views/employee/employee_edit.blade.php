@extends('admin.com_layout')

@section('content')
<style>
    .dark_body label{
        color: white;
    }
</style>
    <div class="row m-0 py-5 justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="shadow border-0">

                <div class="card-header bg-primary text-white p-3">
                    <h5 class="mb-0 font-weight-bold">
                        Edit the Employee Details
                    </h5>
                    <small class="text-white-50">
                        Update Employee Details
                    </small>
                </div>

                <form action="{{ route("employee.edit_submit") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2 m-0 p-0">
                        <div class="col-6">
                            <label for="">Name: </label>
                            <input type="text" name="emp_name" value="{{ $employee->name }}"
                                class="form-control form-control-lg mb-1" required>
                            <label for="">ID: </label>
                            <input type="text" name="candidate_id" value="{{ $employee->id }}"
                                class="form-control form-control-lg mb-1" required readonly>
                            <label for="">Email: </label>
                            <input type="email" name="emp_email" value="{{ $employee->email }}"
                                class="form-control form-control-lg mb-1" required>
                            <label for="">Password: </label>
                            <input type="password" name="emp_password" value="{{ $employee->password }}"
                                class="form-control form-control-lg mb-1" required>
                            <label for="">Designation: </label>
                            <input type="text" name="emp_designation" value="{{ $employee->designation }}"
                                class="form-control form-control-lg mb-2" required>

                        </div>
                        <div class="col-6">
                            <label for="">Salary: </label>
                            <input type="text" name="emp_salary" value="{{ $employee->salary }}"
                                class="form-control form-control-lg mb-1" required>
                            <label for="">Joining Date: </label>
                            <input type="date" name="emp_joining" value="{{ $employee->joing_date }}"
                                class="form-control form-control-lg mb-1" required>
                            <label for="">Leaves Calender: </label>
                            <input type="file" name="emp_calender" class="form-control form-control-lg mb-1" required>
                            <label for="">Department: </label>
                            <input type="text" name="emp_department" value="{{ $employee->department }}"
                                class="form-control form-control-lg mb-1" required>
                        </div>
                    </div>
                    <div class="row m-0 p-0">
                        <label for="">Status: </label>
                        <div class="col-6">
                            <label class="d-block border border-success rounded p-3 text-center">

                                <input type="radio" name="emp_status" value="Active" class="mr-2" {{ $employee->status == 'Active' ? 'checked' : '' }}>

                                <span class="text-success font-weight-bold">
                                    Active
                                </span>

                                <div>
                                    <small class="text-success">
                                        Employee is active
                                    </small>
                                </div>

                            </label>
                        </div>

                        <div class="col-6">
                            <label class="d-block border border-danger rounded p-3 text-center">

                                <input type="radio" name="emp_status" value="Deactive" class="mr-2" {{ $employee->status == 'Deactive' ? 'checked' : '' }}>

                                <span class="text-danger font-weight-bold">
                                    Deactive
                                </span>

                                <div>
                                    <small class="text-danger">
                                        Employee is disabled
                                    </small>
                                </div>

                            </label>
                        </div>

                    </div>

                    <div class="card-footer border-0 p-3">
                        <div class="d-flex justify-content-end">

                            <button type="reset" class="btn btn-outline-secondary mr-2 px-4">
                                Reset
                            </button> &nbsp;

                            <button type="submit" class="btn btn-primary px-4">
                                Save Changes
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection