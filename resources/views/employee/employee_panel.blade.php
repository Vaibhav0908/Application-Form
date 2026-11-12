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
                @foreach ($employee as $empl)
                    @foreach ($emp as $can)
                        @if ($can->full_name == session('employee_name'))
                            @if ($empl->name == session('employee_name'))
                                    <div class="col-md-6">
                                        <p><strong>Name:</strong> {{ $empl->name }}</p>
                                        <p><strong>Email:</strong> {{ $empl->email }}</p>
                                        <p><strong>Designation:</strong> {{ $empl->designation }}</p>
                                        <p><strong>Contact:</strong> {{ $can->contact_no }}</p>
                                        <p><strong>Alternate Contact:</strong> {{ $can->alternate_contact }}</p>
                                    </div>

                                    <div class="col-md-6">
                                        <p><strong>Gender:</strong> {{ $can->gender }}</p>
                                        <p><strong>Date Of Birth:</strong> {{ $can->dob }}</p>
                                        <p><strong>City:</strong> {{ $can->city }}</p>
                                        <p><strong>PIN Code:</strong> {{ $can->pincode }}</p>
                                        <p><strong>State:</strong> {{ $can->state }}</p>
                                    </div>
                                </div>

                                <hr>

                                <form action="{{route('add_documents')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row m-0 p-0">
                                        <h4 class="text-primary mb-3"><strong>Documents</strong></h4>

                                        <input type="hidden" name="id" value="{{ $can->id }}">

                                        @if ($can->resume)
                                            <div class="col-md-6 mb-2">
                                                <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                                                    <span class="fw-semibold">Resume</span>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ asset('storage/' . $can->resume) }}" class="btn btn-outline-primary btn-sm"
                                                            target="_blank">
                                                            <i class="bi bi-eye"></i> View
                                                        </a>

                                                        <a href="{{ asset('storage/' . $can->resume) }}" class="btn btn-success btn-sm" download>
                                                            <i class="bi bi-download"></i> Download
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-6 mb-2">
                                                <span class="fw-semibold">Resume</span>
                                                <input type="file" name="resume" accept=".pdf,.jpg,.jpeg">
                                            </div>
                                        @endif

                                        @if ($can->passport_photo)
                                            <div class="col-md-6 mb-2">
                                                <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                                                    <span class="fw-semibold">Passport Photo</span>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ asset('storage/' . $can->passport_photo) }}"
                                                            class="btn btn-outline-primary btn-sm" target="_blank">
                                                            <i class="bi bi-eye"></i> View
                                                        </a>

                                                        <a href="{{ asset('storage/' . $can->passport_photo) }}" class="btn btn-success btn-sm"
                                                            download>
                                                            <i class="bi bi-download"></i> Download
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-6 mb-2">
                                                <span class="fw-semibold">Passport Photo</span>
                                                <input type="file" name="passport" accept=".pdf,.jpg,.jpeg">
                                            </div>
                                        @endif

                                        @if ($can->degree_certificate)
                                            <div class="col-md-6 mb-2">
                                                <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                                                    <span class="fw-semibold">Degree / Certificate</span>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ asset('storage/' . $can->degree_certificate) }}"
                                                            class="btn btn-outline-primary btn-sm" target="_blank">
                                                            <i class="bi bi-eye"></i> View
                                                        </a>

                                                        <a href="{{ asset('storage/' . $can->degree_certificate) }}" class="btn btn-success btn-sm"
                                                            download>
                                                            <i class="bi bi-download"></i> Download
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-6 mb-5">
                                                <span class="fw-semibold">Degree / Certificate</span>
                                                <input type="file" name="degree" accept=".pdf,.jpg,.jpeg">
                                            </div>
                                        @endif

                                        @if ($can->aadhar_card)
                                            <div class="col-md-6 mb-2">
                                                <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                                                    <span class="fw-semibold">Aadhar Card</span>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ asset('storage/' . $can->aadhar_card) }}" class="btn btn-outline-primary btn-sm"
                                                            target="_blank">
                                                            <i class="bi bi-eye"></i> View
                                                        </a>

                                                        <a href="{{ asset('storage/' . $can->aadhar_card) }}" class="btn btn-success btn-sm"
                                                            download>
                                                            <i class="bi bi-download"></i> Download
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-6 mb-5">
                                                <span class="fw-semibold">Aadhar Card</span>
                                                <input type="file" name="aadhar" accept=".pdf,.jpg,.jpeg">
                                            </div>
                                        @endif

                                        @if ($can->passbook)
                                            <div class="col-md-6 mb-2">
                                                <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                                                    <span class="fw-semibold">Passbook</span>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ asset('storage/' . $can->passbook) }}" class="btn btn-outline-primary btn-sm"
                                                            target="_blank">
                                                            <i class="bi bi-eye"></i> Views
                                                        </a>

                                                        <a href="{{ asset('storage/' . $can->passbook) }}" class="btn btn-success btn-sm" download>
                                                            <i class="bi bi-download"></i> Download
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-6 mb-5">
                                                <span class="fw-semibold">Passbook</span>
                                                <input type="file" name="passbook" accept=".pdf,.jpg,.jpeg">
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-3 my-3">
                                                @if (!$can->resume || !$can->passbook || !$can->aadhar_card || !$can->degree_certificate || !$can->passport_photo)
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                @endif
                                            </div>
                                        </div>
                                </form>

                                <hr>

                                <div class="row m-0 p-0">
                                    <h4 class="text-primary mb-3"><strong>Leaves Calender</strong></h4>
                                    @if ($empl->calender)
                                        <div class="col-md-6 mb-2">
                                            <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                                                <span class="fw-semibold">Leaves Calender</span>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ asset('storage/' . $empl->calender) }}" class="btn btn-outline-primary btn-sm"
                                                        target="_blank">
                                                        <i class="bi bi-eye"></i> View
                                                    </a>

                                                    <a href="{{ asset('storage/' . $empl->calender) }}" class="btn btn-success btn-sm" download>
                                                        <i class="bi bi-download"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                                            <span class="fw-semibold">Leaves Calender</span>
                                            <span class="text-danger">Not uploaded yet</span>
                                        </div>
                                    @endif
                                </div>

                            @endif
                        @endif
                    @endforeach
                @endforeach
        </div>
    </div>
@endsection