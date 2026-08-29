<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $candidate->full_name }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
</head>

<style>
    .card {
        border-radius: 18px;
        overflow: hidden;
    }

    .card-header {
        font-weight: 600;
        letter-spacing: .5px;
    }

    .card-body p {
        padding: 8px 12px;
        margin-bottom: 5px;
        background: #f8f9fa;
        border-radius: 8px;
    }

    .card-body p strong {
        color: #343a40;
    }

    .card:hover {
        transform: translateY(-3px);
        transition: 0.3s ease;
        box-shadow: 0 15px 35px rgba(0, 0, 0, .12) !important;
    }

    .status {
        padding: 6px 15px;
        border-radius: 20px;
        color: white;
        font-size: 13px;
    }
</style>

<body>
    <div class="container py-4">

        @if (session('success'))
            <div id="successAlert" class="alert alert-success position-fixed top-1 end-0 z-3 ">
                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>

            <script>
                setTimeout(() => {
                    document.getElementById('successAlert')?.remove();
                }, 5000);
            </script>
        @endif

        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-primary text-white ">
                <div class="row">
                    <div class="col-md-5">
                        <h2 class="mb-0">Candidate Details</h2>
                    </div>
                    <div class="col-md-7 d-flex justify-content-right justify-content-md-end">
                        <div class="col-lg-1 col-md-2 col-2 bg-primary rounded-circle">
                            <img src="{{ asset('storage/' . $candidate->passport_photo) }}" alt="passport" width="100%"
                                height="50px" class="border rounded-circle">
                        </div>
                        <div class="col-4">
                            <span class="h5"><strong>{{ $candidate->full_name }}</strong></span><br>
                            <span><strong>{{ $candidate->email }}</strong></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $candidate->full_name }}</p>
                        <p><strong>Email:</strong> {{ $candidate->email }}</p>
                        <p><strong>Contact:</strong> {{ $candidate->contact_no }}</p>
                        <p><strong>Alternate Contact:</strong> {{ $candidate->alternate_contact }}</p>
                        <p><strong>Gender:</strong> {{ $candidate->gender }}</p>
                        <p><strong>Date Of Birth:</strong> {{ $candidate->dob }}</p>
                        <p><strong>City:</strong> {{ $candidate->city }}</p>
                        <p><strong>State:</strong> {{ $candidate->state }}</p>
                    </div>

                    <div class="col-md-6">
                        <p><strong>Pincode:</strong> {{ $candidate->pincode }}</p>
                        <p><strong>Nationality:</strong> {{ $candidate->nationality }}</p>
                        <p><strong>Religion:</strong> {{ $candidate->religion }}</p>
                        <p><strong>Marital Status:</strong> {{ $candidate->marital_status }}</p>
                        <p><strong>Designation:</strong> {{ $candidate->applicant_designation }}</p>
                        <p><strong>HR Name:</strong> {{ $candidate->reference_name }}</p>
                        <p><strong>Platform:</strong> {{ $candidate->platform_name }}</p>
                        <p><strong>Status:</strong>
                            @if (optional($candidate->officeworkDetails)->interview_status != '')
                                @if (optional($candidate->officeworkDetails)->interview_status == 'Pending')
                                    <td><span
                                            class="status bg-warning">{{ optional($candidate->officeworkDetails)->interview_status }}</span>
                                    </td>
                                @elseif (optional($candidate->officeworkDetails)->interview_status == 'Select')
                                    <td><span
                                            class="status bg-success">{{ optional($candidate->officeworkDetails)->interview_status }}</span>
                                    </td>

                                @elseif (optional($candidate->officeworkDetails)->interview_status == 'Hold')
                                    <td><span
                                            class="status bg-dark">{{ optional($candidate->officeworkDetails)->interview_status }}</span>
                                    </td>
                                @else
                                    <td><span
                                            class="status bg-danger">{{ optional($candidate->officeworkDetails)->interview_status }}</span>
                                    </td>
                                @endif

                            @else
                                <span class="status bg-warning">Pending</span>
                            @endif
                        </p>
                    </div>

                    <div class="col-12">
                        <p><strong>Permanent Address:</strong> {{ $candidate->permanent_address }}</p>
                        <p><strong>Current Address:</strong> {{ $candidate->current_address }}</p>
                        <p><strong>Skills:</strong> {{ $candidate->skills }}</p>
                        <p><strong>Current Salary:</strong> {{ $candidate->current_salary }}</p>
                        <p><strong>Expected Salary:</strong> {{ $candidate->expected_salary }}</p>
                        <p><strong>Total Experience:</strong> {{ $candidate->total_experience }}</p>
                        <p><strong>Notice Period:</strong> {{ $candidate->notice_period }}</p>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                                <span class="fw-semibold">Resume</span>
                                <div class="d-flex gap-2">
                                    <a href="{{ asset('storage/' . $candidate->resume) }}"
                                        class="btn btn-outline-primary btn-sm" target="_blank">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    <a href="{{ asset('storage/' . $candidate->resume) }}"
                                        class="btn btn-success btn-sm" download>
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                                <span class="fw-semibold">Passport Photo</span>
                                <div class="d-flex gap-2">
                                    <a href="{{ asset('storage/' . $candidate->passport_photo) }}"
                                        class="btn btn-outline-primary btn-sm" target="_blank">
                                        <i class="bi bi-eye"></i> View
                                    </a>

                                    <a href="{{ asset('storage/' . $candidate->passport_photo) }}"
                                        class="btn btn-success btn-sm" download>
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                                <span class="fw-semibold">Degree / Certificate</span>
                                <div class="d-flex gap-2">
                                    <a href="{{ asset('storage/' . $candidate->degree_certificate) }}"
                                        class="btn btn-outline-primary btn-sm" target="_blank">
                                        <i class="bi bi-eye"></i> View
                                    </a>

                                    <a href="{{ asset('storage/' . $candidate->degree_certificate) }}"
                                        class="btn btn-success btn-sm" download>
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                                <span class="fw-semibold">Aadhar Card</span>
                                <div class="d-flex gap-2">
                                    <a href="{{ asset('storage/' . $candidate->aadhar_card) }}"
                                        class="btn btn-outline-primary btn-sm" target="_blank">
                                        <i class="bi bi-eye"></i> View
                                    </a>

                                    <a href="{{ asset('storage/' . $candidate->aadhar_card) }}"
                                        class="btn btn-success btn-sm" download>
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                                <span class="fw-semibold">Passbook</span>
                                <div class="d-flex gap-2">
                                    <a href="{{ asset('storage/' . $candidate->passbook) }}"
                                        class="btn btn-outline-primary btn-sm" target="_blank">
                                        <i class="bi bi-eye"></i> View
                                    </a>

                                    <a href="{{ asset('storage/' . $candidate->passbook) }}"
                                        class="btn btn-success btn-sm" download>
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-info text-white">
                <h3>Family Details</h3>
            </div>

            <div class="card-body">
                @foreach ($candidate->familyDetails as $family)
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Name:</strong> {{ $family->member_name }}</p>
                            <p><strong>Relation:</strong> {{ $family->relationship }}</p>
                            <p><strong>Mobile:</strong> {{ $family->mobile }}</p>
                        </div>

                        <div class="col-md-6">
                            <p><strong>Age:</strong> {{ $family->age }}</p>
                            <p><strong>Occupation:</strong> {{ $family->occupation }}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>

        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-warning text-dark">
                <h3>Education Details</h3>
            </div>

            <div class="card-body">
                @foreach ($candidate->educationDetails as $educate)
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Qualification:</strong> {{ $educate->qualification }}</p>
                            <p><strong>College:</strong> {{ $educate->college_university }}</p>
                        </div>

                        <div class="col-md-6">
                            <p><strong>Passing Year:</strong> {{ $educate->passing_year }}</p>
                            <p><strong>Percentage/CGPA:</strong> {{ $educate->percentage_cgpa }}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>

        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-success text-white">
                <h3>Professional Details</h3>
            </div>

            <div class="card-body">
                @foreach ($candidate->professionalDetails as $prof)
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Company:</strong> {{ $prof->company_name }}</p>
                            <p><strong>Designation:</strong> {{ $prof->designation }}</p>
                            <p><strong>Currently Working:</strong> {{ $prof->currently_working }}</p>
                        </div>

                        <div class="col-md-6">
                            <p><strong>Salary/CTC:</strong> {{ $prof->salary_ctc }}</p>
                            <p><strong>Duration:</strong>
                                <span class="bg-white"> {{ $prof->working_start_date }}</span> - <span
                                    class="bg-white">{{ $prof->working_end_date }}</span>
                            </p>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
    <hr class="pb-5">


    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                <h3 class="mb-0">
                    <i class="bi bi-clipboard-check me-2"></i>Office Work Evaluation
                </h3>
            </div>

            <div class="card-body p-4">
                @php
                    $office = $candidate->officeworkDetails;
                @endphp

                <form action="{{ route('office.form', $candidate->id) }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Experience Rating</label>
                                @if (session('recruiter_name'))
                                    <textarea name="experience_rating"
                                        class="form-control">{{ $office?->experience_rating ?? '' }}</textarea>
                                @elseif(session('admin_username'))
                                    <p class="form-control">{{ $office?->experience_rating ?? '' }}</p>
                                @endif

                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Communication Skill </label>
                                @if (session('recruiter_name'))
                                    <textarea name="communication_skill"
                                        class="form-control">{{ $office?->communication_skills ?? '' }}</textarea>
                                @elseif(session('admin_username'))
                                    <p class="form-control">{{ $office?->communication_skills ?? '' }}</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Computer Skill</label>
                                @if (session('recruiter_name'))
                                    <textarea name="computer_skill"
                                        class="form-control">{{ $office?->computer_skills ?? '' }}</textarea>
                                @elseif(session('admin_username'))
                                    <p class="form-control">{{ $office?->computer_skills ?? '' }}</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Interpersonal Skill</label>
                                @if (session('recruiter_name'))
                                    <textarea name="interpersonal_skill"
                                        class="form-control">{{ $office?->interpersonal_skills ?? '' }}</textarea>
                                @elseif(session('admin_username'))
                                    <p class="form-control">{{ $office?->interpersonal_skills ?? '' }}</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Learning Ability</label>
                                @if (session('recruiter_name'))
                                    <textarea name="learning_ability"
                                        class="form-control">{{ $office?->learning_ability ?? '' }}</textarea>
                                @elseif(session('admin_username'))
                                    <p class="form-control">{{ $office?->learning_ability ?? '' }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Presentation Skill</label>
                                @if (session('recruiter_name'))
                                    <textarea name="presentation_skill"
                                        class="form-control">{{ $office?->presentation_skills ?? '' }}</textarea>
                                @elseif(session('admin_username'))
                                    <p class="form-control">{{ $office?->presentation_skills ?? '' }}</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Technical Skill</label>
                                @if (session('recruiter_name'))
                                    <textarea name="technical_skill"
                                        class="form-control">{{ $office?->technical_skills ?? '' }}</textarea>
                                @elseif(session('admin_username'))
                                    <p class="form-control">{{ $office?->technical_skills ?? '' }}</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Attitude</label>
                                @if (session('recruiter_name'))
                                    <textarea name="attitude" class="form-control">{{ $office?->attitude ?? '' }}</textarea>
                                @elseif(session('admin_username'))
                                    <p class="form-control">{{ $office?->attitude ?? '' }}</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Confidence</label>
                                @if (session('recruiter_name'))
                                    <textarea name="confidence"
                                        class="form-control">{{ $office?->confidence ?? '' }}</textarea>
                                @elseif(session('admin_username'))
                                    <p class="form-control">{{ $office?->confidence ?? '' }}</p>
                                @endif
                            </div>
                        </div>

                        <hr class="p-1">

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Interview Date</label>
                                @if (session('recruiter_name'))
                                    <input type="date" class="form-control" value="{{ $office?->interview_date }}"
                                        name="interview_date">
                                @elseif(session('admin_username'))
                                    <p class="form-control">{{ $office?->interview_date ?? '' }}</p>
                                @endif
                            </div>

                            <div class="">
                                <label class="form-label fw-semibold">Interviewed By</label>
                                @if(session('admin_username'))
                                    @if ($candidate->reference_name == 'NA' && optional($candidate->officeworkDetails)->interviewed_by == null )
                                        <select class="form-select" name="interview_by">
                                            <option value="" disabled {{ !$office?->interviewed_by ? 'selected' : '' }}>
                                                Select Interviewer
                                            </option>
                                            @foreach ($recruiters as $rec)
                                                <option value="{{ $rec->name }}" @selected($office?->interviewed_by == $rec->name)>
                                                    {{ $rec->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p class="form-control">{{ $office?->interviewed_by ?? $candidate->reference_name }}</p>
                                    @endif
                                @elseif(session('recruiter_name'))
                                    <!-- <select class="form-select" name="interview_by">
                                        <option value="" disabled {{ !$office?->interviewed_by ? 'selected' : '' }}>
                                            Select Interviewer
                                        </option>
                                        @foreach ($recruiters as $rec)
                                            <option value="{{ $rec->name }}" @selected($office?->interviewed_by == $rec->name)>
                                                {{ $rec->name }}
                                            </option>
                                        @endforeach
                                    </select> -->
                                    <p class="form-control">{{ $office?->interviewed_by ??  $candidate->reference_name}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Interview Status<sup
                                        class="text-danger">*</sup></label>
                                @if (session('recruiter_name'))
                                    <select class="form-select" name="interview_status" required>
                                        <option value="" disabled {{ !$office?->interview_status ? 'selected' : '' }}>
                                            Pending
                                        </option>

                                        @foreach ($interview_status as $int_status)
                                            <option value="{{ $int_status->interview_status }}"
                                                @selected($office?->interview_status == $int_status->interview_status)>
                                                {{ $int_status->interview_status }}
                                            </option>
                                        @endforeach
                                    </select>
                                @elseif(session('admin_username'))
                                    @if ($candidate->reference_name == 'NA' && optional($candidate->officeworkDetails)->interviewed_by == null )
                                        <select class="form-select" name="interview_status" required>
                                            <option value="" disabled {{ !$office?->interview_status ? 'selected' : '' }}>
                                                Pending
                                            </option>       

                                            @foreach ($interview_status as $int_status)
                                                <option value="{{ $int_status->interview_status }}"
                                                    @selected($office?->interview_status == $int_status->interview_status)>
                                                    {{ $int_status->interview_status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p class="form-control">{{ $office?->interview_status ?? '' }}</p>
                                    @endif
                                @endif
                            </div>
                            <div class="">
                                <label class="form-label fw-semibold">Salary Offered</label>
                                @if (session('recruiter_name'))
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" name="salary_offered"
                                            placeholder="Enter Salary" value="{{ $office?->salary_offered }}">
                                    </div>
                                @elseif(session('admin_username'))
                                    <p class="form-control">{{ $office?->salary_offered ?? '' }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Interview Remarks</label>
                                @if (session('recruiter_name'))
                                    <textarea class="form-control" rows="4" name="interview_remarks"
                                        placeholder="Enter interview remarks...">{{ $office?->interview_remarks }}</textarea>
                                @elseif(session('admin_username'))
                                    <p class="form-control">{{ $office?->interview_remarks ?? '' }}</p>
                                @endif
                            </div>
                        </div>

                        @if (session('admin_username'))
                            @if ($candidate->reference_name == 'NA' && optional($candidate->officeworkDetails)->interviewed_by == null )
                                <div class="text-end p-2">
                                    <button type="reset" class="btn btn-outline-secondary px-4">
                                        Reset
                                    </button>

                                    <button type="submit" class="btn btn-primary px-4 ms-2">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Save Evaluation
                                    </button>
                                </div>
                            @endif

                        @elseif(session('recruiter_name'))
                            <div class="text-end p-2">
                                <button type="reset" class="btn btn-outline-secondary px-4">
                                    Reset
                                </button>

                                <button type="submit" class="btn btn-primary px-4 ms-2">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Save Evaluation
                                </button>
                            </div>
                        @endif

                    </div>
                </form>
            </div>
        </div>

        <div class="alert alert-info m-0" role="alert">
            <i class="bi bi-info-circle me-2"></i>
            Please fill in all evaluation details carefully before submitting the office work assessment form.
        </div>

</body>

</html>