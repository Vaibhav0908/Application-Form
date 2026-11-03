@extends('admin.com_layout')

@section('content')

    <style>
        .card {
            border-radius: 18px;
            height: 680px;
            overflow: scroll;
            cursor: auto;
        }

        .card-header {
            font-weight: 600;
            letter-spacing: .5px;
        }

        .card:hover {
            transform: none;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .12) !important;
        }

        form textarea {
            padding: 10px;
            width: 100%;
        }
    </style>

    <div class="card shadow border-0">
        <div class="card-body">
            <div class="row m-0 p-0">
                <h4 class="text-primary mb-3"><strong>Information</strong></h4>
                <div class="col-md-6">
                    <p><strong>Name:</strong> </p>
                    <p><strong>Email:</strong> </p>
                    <p><strong>Designation:</strong></p>
                    <p><strong>Contact:</strong></p>
                    <p><strong>Alternate Contact:</strong></p>
                </div>

                <div class="col-md-6">
                    <p><strong>Gender:</strong> </p>
                    <p><strong>Date Of Birth:</strong></p>
                    <p><strong>City:</strong></p>
                    <p><strong>PIN Code:</strong></p>
                    <p><strong>State:</strong></p>
                </div>
            </div>

            <hr>

            <div class="row m-0 p-0">
                <h4 class="text-primary mb-3"><strong>Documents</strong></h4>
                <div class="col-md-6 mb-2">
                    <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Resume</span>
                        <div class="d-flex gap-2">
                            <a href="" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="bi bi-eye"></i> View
                            </a>

                            <a href="" class="btn btn-success btn-sm" download>
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Passport Photo</span>
                        <div class="d-flex gap-2">
                            <a href="" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="bi bi-eye"></i> View
                            </a>

                            <a href="" class="btn btn-success btn-sm" download>
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Degree / Certificate</span>
                        <div class="d-flex gap-2">
                            <a href="" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="bi bi-eye"></i> View
                            </a>

                            <a href="" class="btn btn-success btn-sm" download>
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Aadhar Card</span>
                        <div class="d-flex gap-2">
                            <a href="" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="bi bi-eye"></i> View
                            </a>

                            <a href="" class="btn btn-success btn-sm" download>
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Passbook</span>
                        <div class="d-flex gap-2">
                            <a href="" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="bi bi-eye"></i> View
                            </a>

                            <a href="" class="btn btn-success btn-sm" download>
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row m-0 p-0">
                <h4 class="text-primary mb-3"><strong>Leaves Calender</strong></h4>
                <div class="col-md-6 mb-2">
                    <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Leaves Calender</span>
                        <div class="d-flex gap-2">
                            <a href="" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="bi bi-eye"></i> View
                            </a>

                            <a href="" class="btn btn-success btn-sm" download>
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection