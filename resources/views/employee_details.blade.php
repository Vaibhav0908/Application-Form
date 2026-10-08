@extends('admin.com_layout')

@section('content')

    <style>
        .card {
            border-radius: 18px;
            height: 680px;
            overflow: scroll;
        }

        .card-header {
            font-weight: 600;
            letter-spacing: .5px;
        }

        .card:hover {
            transform: none;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .12) !important;
        }

        form textarea{
            padding: 10px;
            width: 100%;
        }
    </style>
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white ">
            <img src="{{ asset('storage/' . $employee->passport_photo) }}" alt="passport" width="70px" height="70px"
                class="border rounded-circle">
            <span
                style="display: inline-block; position: absolute; margin: 10px 0px 0px 10px;"><strong>{{ $employee->full_name }}</strong></span>
            <span class="text-warning"
                style="display: inline-block; position: absolute; margin: 35px 0px 0px 10px;">({{ $employee->applicant_designation }})</span>
        </div>

        <div class="card-body">
            <div class="row m-0 p-0">
                <h4 class="text-primary mb-3"><strong>Employee Information</strong></h4>
                <div class="col-md-6">
                    <p><strong>Name:</strong> {{ $employee->full_name }}</p>
                    <p><strong>Email:</strong> {{ $employee->email }}</p>
                    <p><strong>Designation:</strong> {{ $employee->applicant_designation }}</p>
                    <p><strong>Contact:</strong> {{ $employee->contact_no }}</p>
                    <p><strong>Alternate Contact:</strong> {{ $employee->alternate_contact }}</p>
                </div>

                <div class="col-md-6">
                    <p><strong>Gender:</strong> {{ $employee->gender }}</p>
                    <p><strong>Date Of Birth:</strong> {{ $employee->dob }}</p>
                    <p><strong>City:</strong> {{ $employee->city }}</p>
                    <p><strong>PIN Code:</strong> {{ $employee->pincode }}</p>
                    <p><strong>State:</strong> {{ $employee->state }}</p>
                </div>
            </div>

            <hr>

            <div class="row m-0 p-0">
                <h4 class="text-primary mb-3"><strong>Employee Documents</strong></h4>

                @if ($employee->resume)
                    <div class="col-md-6 mb-2">
                        <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                            <span class="fw-semibold">Resume</span>
                            <div class="d-flex gap-2">
                                <a href="{{ asset('storage/' . $employee->resume) }}" class="btn btn-outline-primary btn-sm"
                                    target="_blank">
                                    <i class="bi bi-eye"></i> View
                                </a>

                                <a href="{{ asset('storage/' . $employee->resume) }}" class="btn btn-success btn-sm" download>
                                    <i class="bi bi-download"></i> Download
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($employee->passport_photo)
                    <div class="col-md-6 mb-2">
                        <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                            <span class="fw-semibold">Passport Photo</span>
                            <div class="d-flex gap-2">
                                <a href="{{ asset('storage/' . $employee->passport_photo) }}"
                                    class="btn btn-outline-primary btn-sm" target="_blank">
                                    <i class="bi bi-eye"></i> View
                                </a>

                                <a href="{{ asset('storage/' . $employee->passport_photo) }}" class="btn btn-success btn-sm"
                                    download>
                                    <i class="bi bi-download"></i> Download
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($employee->degree_certificate)
                    <div class="col-md-6 mb-2">
                        <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                            <span class="fw-semibold">Degree / Certificate</span>
                            <div class="d-flex gap-2">
                                <a href="{{ asset('storage/' . $employee->degree_certificate) }}"
                                    class="btn btn-outline-primary btn-sm" target="_blank">
                                    <i class="bi bi-eye"></i> View
                                </a>

                                <a href="{{ asset('storage/' . $employee->degree_certificate) }}" class="btn btn-success btn-sm"
                                    download>
                                    <i class="bi bi-download"></i> Download
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($employee->aadhar_card)
                    <div class="col-md-6 mb-2">
                        <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                            <span class="fw-semibold">Aadhar Card</span>
                            <div class="d-flex gap-2">
                                <a href="{{ asset('storage/' . $employee->aadhar_card) }}"
                                    class="btn btn-outline-primary btn-sm" target="_blank">
                                    <i class="bi bi-eye"></i> View
                                </a>

                                <a href="{{ asset('storage/' . $employee->aadhar_card) }}" class="btn btn-success btn-sm"
                                    download>
                                    <i class="bi bi-download"></i> Download
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($employee->passbook)
                    <div class="col-md-6 mb-2">
                        <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                            <span class="fw-semibold">Passbook</span>
                            <div class="d-flex gap-2">
                                <a href="{{ asset('storage/' . $employee->passbook) }}" class="btn btn-outline-primary btn-sm"
                                    target="_blank">
                                    <i class="bi bi-eye"></i> View
                                </a>

                                <a href="{{ asset('storage/' . $employee->passbook) }}" class="btn btn-success btn-sm" download>
                                    <i class="bi bi-download"></i> Download
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <hr>

            <div class="row m-0 p-0">
                <h4 class="text-primary mb-3"><strong>Employee Tasks</strong></h4>
                <div class="col-md-12">
                    <form action="" method="post" class="">
                        @csrf
                        <textarea name="" id="" class="border rounded" placeholder="Add New Task..."></textarea><br>

                        <button type="reset" class="btn btn-light">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <hr>

            <div class="row m-0 p-0">
                <h4 class="text-primary mb-3"><strong>Task Lists</strong></h4>
                <div class="col-md-12 mb-3">
                    
                </div>
            </div>

        </div>
    </div>
@endsection