<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Candidate Application Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @if (session('success'))
        <div id="successAlert" class="alert alert-success position-fixed top-1 end-0 z-3 ">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @elseif($errors->any())
        <div id="errorAlert" class="alert alert-danger position-fixed top-0 end-0 z-3 m-3">

            {{ $errors->first() }}

            <button type="button" class="btn-close" data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->

    <div class="container main-container">
        <div class="header">
            <h1 class="">
                Girish Group of Companies <br>
                Baramati and Pune <br />
                <span class="h4"><i class="bi bi-person-workspace"></i> Job Application Form</span>
            </h1>
            <p>Fill your details carefully</p>
        </div>

        <div class="form-card">
            <form id="candidateForm" action="{{ route('candidate.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <h4 class="section-title">Interview Application</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <span>Interview for the position<sup class="text-danger">*</sup>
                            <input type="text" class="form-control" name="designation" pattern="[a-zA-Z. ]+" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Date of Application<sup class="text-danger">*</sup></label>
                        <input type="date" name="apply_date" class="form-control" required />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Refrence<sup class="text-danger">*</sup></label>
                        <select name="refrence" class="form-control" required>
                            <option selected disabled>--Please Select--</option>
                            @foreach ($recruiters as $rec)
                                <option value="{{ $rec->name }}">{{ $rec->name }}</option>
                            @endforeach
                            <option value="NA">NA</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Where You Found Us<sup class="text-danger">*</sup></label><br>
                        <select class="form-control" name="platforms" required>
                            <option selected disabled>--Please Select--</option>
                            @foreach ($platforms as $plat)
                                <option value="{{ $plat->platform_name }}">{{ $plat->platform_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr>

                <h4 class="section-title">Personal Information</h4>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Full Name<sup class="text-danger">*</sup></label>

                        <input type="text" name="candidate_name" class="form-control" placeholder="Enter Name"
                            pattern="[a-zA-Z. ]+" required />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Email<sup class="text-danger">*</sup></label>

                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Mobile Number<sup class="text-danger">*</sup></label>

                        <input type="text" name="mobile" class="form-control" placeholder="Mobile Number"
                            pattern="[0-9]{10}" required />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Alternate Mobile Number</label>

                        <input type="text" name="alt_mobile" class="form-control" placeholder="Mobile Number"
                            pattern="[0-9]{10}" />
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Date Of Birth<sup class="text-danger">*</sup></label>

                        <input type="date" name="dob" class="form-control" required />
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Gender<sup class="text-danger">*</sup></label>

                        <select class="form-select" name="gender" required>
                            <option selected disabled>--Please Select--</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Marrital Status<sup class="text-danger">*</sup></label>

                        <select class="form-control" name="marrital_status" required>
                            <option selected disabled>--Please Select--</option>
                            <option>Married</option>
                            <option>Unmarried</option>
                            <option>Single</option>
                            <option>Divorsed</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>City<sup class="text-danger">*</sup></label>

                        <input type="text" name="city" placeholder="Enter your city" class="form-control"
                            pattern="[a-zA-Z. ]+" required />
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>State<sup class="text-danger">*</sup></label>

                        <input type="text" name="state" placeholder="Enter your State" class="form-control"
                            pattern="[a-zA-Z. ]+" required />
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Pincode<sup class="text-danger">*</sup></label>

                        <input type="text" name="pincode" class="form-control" pattern="[0-9]{6}" required />
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Nationality<sup class="text-danger">*</sup></label>
                        <select class="form-control" name="nationality" required>
                            <option selected disabled>--Please Select--</option>nations
                           @foreach ($nations as $nat)
                                <option value="{{ $nat->nation }}">{{ $nat->nation }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Religion</label>
                        <input type="text" name="religion" class="form-control" pattern="[a-zA-Z. ]+" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Permanent Address<sup class="text-danger">*</sup></label>

                        <textarea name="permanent_address" class="form-control" pattern="[a-zA-Z0-9.,(){}[\]\-:; ]+"
                            required></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Current Address<sup class="text-danger">*</sup></label>

                        <textarea name="current_address" class="form-control" pattern="[a-zA-Z0-9.,(){}\-:; ]+"
                            required></textarea>
                    </div>
                </div>

                <hr>

                <h4 class="section-title">Family Details</h4>

                <div id="familyContainer">
                    <div class="row group-fam">
                        <div class="col-md-6 mb-3">
                            <label>Full Name<sup class="text-danger">*</sup></label>

                            <input type="text" name="family_name[]" class="form-control" placeholder="Enter Name"
                                pattern="[a-zA-Z. ]+" required />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Relation<sup class="text-danger">*</sup></label>
                            <select name="relation[]" class="form-control" required>
                                <option selected disabled>--Please Select--</option>
                                <option>Father</option>
                                <option>Mother</option>
                                <option>Brother</option>
                                <option>Sister</option>
                                <option>Relatives</option>
                                <option>Friends</option>
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label>Age<sup class="text-danger">*</sup></label>

                            <input type="number" name="age[]" class="form-control" required />
                        </div>

                        <div class="col-md-3 mb-3">
                            <label>Mobile Number<sup class="text-danger">*</sup></label>

                            <input type="text" name="family_mobile[]" class="form-control" placeholder="Mobile Number"
                                pattern="[0-9]{10}" required />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Occupation<sup class="text-danger">*</sup></label>

                            <input type="text" name="occupation[]" class="form-control" pattern="[a-zA-Z. ]+"
                                required />
                        </div>
                    </div>
                    <hr />
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button type="button" class="add-more btn btn-primary" id="addMorefam">
                        <i class="fas fa-user-plus"></i> Add More
                    </button>
                </div>

                <h4 class="section-title">Education Details</h4>

                <div id="qualificationContainer">
                    <div class="row group-qua">
                        <div class="col-md-6 mb-3">
                            <label>Qualification<sup class="text-danger">*</sup></label>

                            <input type="text" name="qualification[]" class="form-control" pattern="[a-zA-Z.{}[\]() ]+"
                                required />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>University / College<sup class="text-danger">*</sup></label>

                            <input name="college[]" type="text" class="form-control" pattern="[a-zA-Z.{}[\]() ]+"
                                required />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Passing Year<sup class="text-danger">*</sup></label>
                            <input type="number" name="passing_year[]" class="form-control" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Percentage / CGPA<sup class="text-danger">*</sup></label>

                            <input type="text" name="percentage[]" class="form-control" pattern="[0-9.%]+" required />
                        </div>
                    </div>
                    <hr />
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button type="button" class="add-more btn btn-primary" id="addMorequa">
                        <i class="fas fa-user-plus"></i> Add More
                    </button>
                </div>

                <h4 class="section-title">Professional Details</h4>

                <div id="professionalContainer">
                    <div class="row group-pro">

                        <div class="col-md-6 mb-3">
                            <label>Company</label>

                            <input type="text" name="company[]" class="form-control" pattern="[a-zA-Z ]+" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Designation</label>

                            <input type="text" name="pro_designation[]" class="form-control" pattern="[a-zA-Z() ]+" />
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label>Salary/CTC</label>

                            <input type="text" name="salary[]" class="form-control" pattern="[0-9.]+" />
                        </div>

                        <div class="col-lg-4 mb-3">
                            <div class="d-flex justify-content-center">
                                <label>Working Period</label>
                            </div>
                            <span class="d-flex justify-content-center">
                                <input type="date" name="sart_time[]" class="form-date" /> &nbsp; &nbsp; to &nbsp;
                                &nbsp;
                                <input type="date" name="end_time[]" class="form-date" />
                            </span>

                        </div>

                        <div class="col-lg-4 mb-3">
                            <label>Currently Working</label>
                            <select name="curr_working[]" class="form-control">
                                <option selected disabled>--Please Select--</option>
                                <option>Serving Notice Period</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button type="button" class="add-more btn btn-primary" id="addmorepro">
                        <i class="fas fa-user-plus"></i> Add More
                    </button>
                </div>

                <div class="col-md-12 mb-3">
                    <label>Skills<sup class="text-danger">*</sup></label>

                    <textarea name="skills" class="form-control" placeholder="HTML, CSS, JavaScript, Bootstrap"
                        required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Total Experience<sup class="text-danger">*</sup></label>

                        <input type="text" name="total_experience" class="form-control" pattern="[0-9]{1,2}" required />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Will You Able To Relocate<sup class="text-danger">*</sup></label>
                        <select name="relocate" class="form-control" required>
                            <option selected disabled>--Please Select--</option>
                            <option>Yes</option>
                            <option>No</option>
                            <option>Planning To Relocate</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Last Salary/CTC<sup class="text-danger">*</sup></label>

                        <input type="text" name="last_salary" class="form-control" pattern="[0-9.]+" required />
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Expected Salary/CTC<sup class="text-danger">*</sup></label>

                        <input type="text" name="expected_salary" class="form-control" pattern="[0-9.]+" required />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Notice Period<sup class="text-danger">*</sup></label>
                        <select name="notice_period" class="form-control" required>
                            <option selected disabled>--Please Select--</option>
                            <option>Immadiate Joiner</option>
                            <option>15 Days</option>
                            <option>1 Month</option>
                            <option>2 Month</option>
                        </select>
                    </div>
                </div>

                <hr>

                <h4 class="section-title">Documents</h4>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="upload-box">
                            <i class="bi bi-file-earmark-arrow-up fs-1"></i>
                            <br />
                            <label>Passport Photo<sup class="text-danger">*</sup></label>
                            <input name="passport" type="file" class="form-control" accept=".jpg,.jpeg,.png" required />
                            <small class="text-muted d-block mt-2">
                                Allowed formats: JPG, JPEG, PNG
                            </small>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="upload-box">
                            <i class="bi bi-file-earmark-arrow-up fs-1"></i>
                            <br />
                            <label>Upload Resume<sup class="text-danger">*</sup></label>
                            <input name="resume" type="file" class="form-control" accept=".pdf" required />
                            <small class="text-muted d-block mt-2">
                                Allowed formats: PDF (Max size: 2 MB)
                            </small>
                        </div>
                    </div>

                    <!-- <div class="col-md-6 mb-3">
                        <div class="upload-box">
                            <i class="bi bi-image fs-1"></i>
                            <br />
                            <label>Upload Aadhar Card<sup class="text-danger">*</sup></label>
                            <input type="file" name="aadhar" class="form-control" accept=".jpg,.jpeg,.pdf"  />
                            <small class="text-muted d-block mt-2">
                                Allowed formats: JPG, JPEG, PDF (Max size: 2 MB)
                            </small>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="upload-box">
                            <i class="bi bi-file-earmark-arrow-up fs-1"></i>
                            <br />
                            <label>Upload Certificate/Degree<sup class="text-danger">*</sup></label>
                            <input type="file" name="degree" class="form-control" accept=".jpg,.jpeg,.pdf" />
                            <small class="text-muted d-block mt-2">
                                Allowed formats: JPG, JPEG, PDF (Max size: 2 MB)
                            </small>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="upload-box">
                            <i class="bi bi-image fs-1"></i>
                            <br />
                            <label>Upload Passbook</label>
                            <input type="file" name="passbook" class="form-control" accept=".jpg,.jpeg,.pdf"  />
                            <small class="text-muted d-block mt-2">
                                Allowed formats: JPG, JPEG, PDF (Max size: 2 MB)
                            </small>
                        </div>
                    </div> -->
                </div>


                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" required />

                    <label>
                        I confirm that all information is correct.<sup class="text-danger">*</sup>
                    </label>
                </div>

                <button type="submit" class="submit-btn mt-4">
                    <i class="bi bi-send"></i>
                    Submit Application
                </button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        setTimeout(() => {
            document.getElementById('successAlert')?.remove();
        }, 5000);

        setTimeout(() => {
            document.getElementById('errorAlert')?.remove();
        }, 5000);
    </script>
</body>

</html>