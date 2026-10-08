@extends('admin.com_layout')

@section('content')

<style>
.card {
    width: 90%;
    border: none;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    cursor: pointer;
}

.card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}
</style>
    <div class="card shadow border-0 m-0 p-0">
        <div class="card-header bg-primary text-white ">
            <img src="{{ asset('storage/' . $employee->passport_photo) }}" alt="passport" width="100px" height="50px"
                class="border rounded-circle">
            <span><strong>{{ $employee->email }}</strong></span>
        </div>

        <div class="card-body">
            <div class="row m-0 p-0">
                <h4>Employee Information</h4>
                @if ($employee->passport_photo)
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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


            <div class="row">
                <h4>Employee Documents</h4>
                @if ($employee->passport_photo)
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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


        </div>
    </div>
@endsection