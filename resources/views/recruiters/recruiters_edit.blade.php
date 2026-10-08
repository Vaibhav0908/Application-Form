@extends('admin.com_layout')

@section('content')
        <div class="row m-0 py-5 justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="shadow border-0">

                    <div class="card-header bg-primary text-white py-3">
                        <div class="d-flex align-items-center">
                            <div class="mr-3">
                                <span class="badge badge-light p-2">
                                    <i class="fa fa-building text-primary"></i>
                                </span>
                            </div>

                            <div>
                                <h5 class="mb-0 font-weight-bold">
                                    Edit the HR Details
                                </h5>
                                <small class="text-white-50">
                                    Update HR Details
                                </small>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route("recruiters.edit_submit") }}" method="post">
                        @csrf

                        <div class="card-body p-4">

                            <input type="hidden" name="id" value="{{ $recruiter->id }}">

                            <div class="form-group">
                                <label class="font-weight-bold">
                                    Recruiter Name
                                </label>

                                <input
                                    type="text"
                                    name="rec_name"
                                    class="form-control form-control-lg"
                                    value="{{ $recruiter->name }}"
                                >
                            </div>

                            <input type="hidden" name="id" value="{{ $recruiter->email }}">

                            <div class="form-group">
                                <label class="font-weight-bold">
                                    Recruiter Email
                                </label>

                                <input
                                    type="text"
                                    name="rec_email"
                                    class="form-control form-control-lg"
                                    value="{{ $recruiter->email }}"
                                    readonly
                                >
                            </div>

                            <input type="hidden" name="id" value="{{ $recruiter->password }}">

                            <div class="form-group">
                                <label class="font-weight-bold">
                                    Recruiter Password
                                </label>

                                <input
                                    type="text"
                                    name="rec_password"
                                    class="form-control form-control-lg"
                                    value="{{ $recruiter->password }}"
                                >
                            </div>

                            <div class="form-group mt-4">
                                <label class="font-weight-bold d-block mb-3">
                                    Recruiter Status
                                </label>

                                <div class="row">

                                    <div class="col-6">
                                        <label class="d-block border border-success rounded p-3 text-center">

                                            <input
                                                type="radio"
                                                name="rec_status"
                                                value="Active"
                                                class="mr-2"
                                                {{ $recruiter->status == 'Active' ? 'checked' : '' }}
                                            >

                                            <span class="text-success font-weight-bold">
                                                Active
                                            </span>

                                            <div>
                                                <small class="text-muted">
                                                    Recruiter is active
                                                </small>
                                            </div>

                                        </label>
                                    </div>

                                    <div class="col-6">
                                        <label class="d-block border border-danger rounded p-3 text-center">

                                            <input
                                                type="radio"
                                                name="rec_status"
                                                value="Deactive"
                                                class="mr-2"
                                                {{ $recruiter->status == 'Deactive' ? 'checked' : '' }}
                                            >

                                            <span class="text-danger font-weight-bold">
                                                Deactive
                                            </span>

                                            <div>
                                                <small class="text-muted">
                                                    Recruiter is disabled
                                                </small>
                                            </div>

                                        </label>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="card-footer border-0 p-3">
                            <div class="d-flex justify-content-end">

                                <button
                                    type="reset"
                                    class="btn btn-outline-secondary mr-2 px-4"
                                >
                                    Reset
                                </button>

                                <button
                                    type="submit"
                                    class="btn btn-primary px-4"
                                >
                                    Save Changes
                                </button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


@endsection