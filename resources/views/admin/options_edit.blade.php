@extends('admin.com_layout')

@section('content')

    <div class="row m-0 py-5 justify-content-center">
        <div class="col-md-8 col-lg-6">

            @if(isset($platform))

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
                                    Edit Platform
                                </h5>
                                <small class="text-white-50">
                                    Update platform details
                                </small>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('platform.edit_submit') }}" method="post">
                        @csrf

                        <div class="card-body p-4">

                            <input type="hidden" name="id" value="{{ $platform->id }}">

                            <div class="form-group">
                                <label class="font-weight-bold">
                                    Platform Name
                                </label>

                                <input
                                    type="text"
                                    name="plat_name"
                                    class="form-control form-control-lg"
                                    value="{{ $platform->platform_name }}"
                                    placeholder="Enter platform name"
                                >
                            </div>

                            <div class="form-group mt-4">
                                <label class="font-weight-bold d-block mb-3">
                                    Platform Status
                                </label>

                                <div class="row">

                                    <div class="col-6">
                                        <label class="d-block border border-success rounded p-3 text-center">

                                            <input
                                                type="radio"
                                                name="plat_status"
                                                value="Active"
                                                class="mr-2"
                                                {{ $platform->status == 'Active' ? 'checked' : '' }}
                                            >

                                            <span class="text-success font-weight-bold">
                                                Active
                                            </span>

                                            <div>
                                                <small class="text-muted">
                                                    Platform is active
                                                </small>
                                            </div>

                                        </label>
                                    </div>

                                    <div class="col-6">
                                        <label class="d-block border border-danger rounded p-3 text-center">

                                            <input
                                                type="radio"
                                                name="plat_status"
                                                value="Deactive"
                                                class="mr-2"
                                                {{ $platform->status == 'Deactive' ? 'checked' : '' }}
                                            >

                                            <span class="text-danger font-weight-bold">
                                                Deactive
                                            </span>

                                            <div>
                                                <small class="text-muted">
                                                    Platform is disabled
                                                </small>
                                            </div>

                                        </label>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="card-footer bg-light border-0 p-3">
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


            @elseif(isset($nation))

                <div class="shadow border-0">

                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0 font-weight-bold">
                            Edit Nation
                        </h5>

                        <small class="text-white-50">
                            Update nation details
                        </small>
                    </div>

                    <form action="{{ route('nation.edit_submit') }}" method="post">
                        @csrf

                        <div class="card-body p-4">

                            <input type="hidden" name="id" value="{{ $nation->id }}">

                            <div class="form-group">
                                <label class="font-weight-bold">
                                    Nation Name
                                </label>

                                <input
                                    type="text"
                                    name="nat_name"
                                    class="form-control form-control-lg"
                                    value="{{ $nation->nation }}"
                                    placeholder="Enter nation name"
                                >
                            </div>

                            <div class="form-group mt-4">

                                <label class="font-weight-bold d-block mb-3">
                                    Nation Status
                                </label>

                                <div class="row">

                                    <div class="col-6">
                                        <label class="d-block border border-success rounded p-3 text-center">

                                            <input
                                                type="radio"
                                                name="nat_status"
                                                value="Active"
                                                class="mr-2"
                                                {{ $nation->status == 'Active' ? 'checked' : '' }}
                                            >

                                            <span class="text-success font-weight-bold">
                                                Active
                                            </span>

                                            <div>
                                                <small class="text-muted">
                                                    Nation is active
                                                </small>
                                            </div>

                                        </label>
                                    </div>

                                    <div class="col-6">
                                        <label class="d-block border border-danger rounded p-3 text-center">

                                            <input
                                                type="radio"
                                                name="nat_status"
                                                value="Deactive"
                                                class="mr-2"
                                                {{ $nation->status == 'Deactive' ? 'checked' : '' }}
                                            >

                                            <span class="text-danger font-weight-bold">
                                                Deactive
                                            </span>

                                            <div>
                                                <small class="text-muted">
                                                    Nation is disabled
                                                </small>
                                            </div>

                                        </label>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="card-footer bg-light border-0 p-3">

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


            @elseif(isset($int_status))

                <div class="shadow border-0">

                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0 font-weight-bold">
                            Edit Interview Status
                        </h5>

                        <small class="text-white-50">
                            Update interview status details
                        </small>
                    </div>

                    <form action="{{ route('inter_status_save') }}" method="post">
                        @csrf

                        <div class="card-body p-4">

                            <input
                                type="hidden"
                                name="id"
                                value="{{ $int_status->id }}"
                            >

                            <div class="form-group">

                                <label class="font-weight-bold">
                                    Status Name
                                </label>

                                <input
                                    type="text"
                                    name="inter_name"
                                    class="form-control form-control-lg"
                                    value="{{ $int_status->interview_status }}"
                                    placeholder="Enter interview status"
                                >

                            </div>

                            <div class="form-group mt-4">

                                <label class="font-weight-bold d-block mb-3">
                                    Interview Status
                                </label>

                                <div class="row">

                                    <div class="col-6">

                                        <label class="d-block border border-success rounded p-3 text-center">

                                            <input
                                                type="radio"
                                                name="inter_status"
                                                value="Active"
                                                class="mr-2"
                                                {{ $int_status->status == 'Active' ? 'checked' : '' }}
                                            >

                                            <span class="text-success font-weight-bold">
                                                Active
                                            </span>

                                            <div>
                                                <small class="text-muted">
                                                    Status is active
                                                </small>
                                            </div>

                                        </label>

                                    </div>

                                    <div class="col-6">

                                        <label class="d-block border border-danger rounded p-3 text-center">

                                            <input
                                                type="radio"
                                                name="inter_status"
                                                value="Deactive"
                                                class="mr-2"
                                                {{ $int_status->status == 'Deactive' ? 'checked' : '' }}
                                            >

                                            <span class="text-danger font-weight-bold">
                                                Deactive
                                            </span>

                                            <div>
                                                <small class="text-muted">
                                                    Status is disabled
                                                </small>
                                            </div>

                                        </label>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="card-footer bg-light border-0 p-3">

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

            @endif

        </div>
    </div>


@endsection