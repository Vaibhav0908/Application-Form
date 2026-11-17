@extends('admin.com_layout')

@section('content')

    <style>
        .table-box {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            height: 590px;
            width: 100%;
            overflow-x: auto;
            overflow-y: auto;
        }

        .table-box table {
            width: 100%;
            min-width: 1000px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            white-space: nowrap;
        }
    </style>

    @if (session('recruiter_id'))
        <div class="row align-items-center py-1 mt-5 mx-4 mx-md-5">
            <div class="col-12 col-md-6">
                <h2 class="text-primary fw-bold mb-0">
                    Candidate Records
                </h2>
            </div>

            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <a href="#" data-bs-toggle="modal" data-bs-target="#addrecordsModal" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    Add Records
                </a>

                <!-- <a href="{{ route('export_all_records') }}" class="btn btn-primary export_all">
                                                    <i class="bi bi-cloud-download"></i>
                                                    Export All
                                                </a> -->

                <a href="{{ route('export_selected_records') }}" class="btn btn-primary export_selected">
                    <i class="bi bi-cloud-download"></i>
                    Export Selected
                </a>
            </div>
        </div>

        <div class="row m-0 p-0 d-flex">
            <div class="col-12 m-0 p-0 table-box">
                <table class="">
                    <tr class="sticky-top text-dark">
                        <th><input type="checkbox" class="check_all" name="" id="" value=""></th>
                        <th>Sr. No.</th>
                        <th>Candidate Name</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        <th>Interview Date</th>
                        <th>Interview Time</th>
                        <th>Designation</th>
                        <th>Address</th>
                        <th>Prefered Job Location</th>
                        <th>Last Salary</th>
                        <th>Expected Salary</th>
                        <th>Experience</th>
                        <th>Recruiter Name</th>
                        <th>Response</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($candidate as $item)
                        @if ($item->reference_name == session('recruiter_name'))
                            <tr>
                                <td><input type="checkbox" class="candidate_checkbox" name="" id="" value="{{ $item->id }}"></td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->contact_no }}</td>
                                <td>12/11/2026</td>
                                <td>12pm</td>
                                <td>{{ $item->applicant_designation }}</td>
                                <td>Pune</td>
                                <td>Pune</td>
                                <td>{{ $item->current_salary }}</td>
                                <td>{{ $item->expected_salary }}</td>
                                <td>{{ $item->total_experience }}</td>
                                <td>{{ $item->reference_name }}</td>
                                <td>Intrested</td>
                                <td>
                                    <!-- @if ($item->reference_name == session('recruiter_name')) -->

                                <a href="#" class="btn btn-warning text-white btn-sm">
                                        <i class="bi bi-pencil"></i> Response
                                    </a>


                                <a href="whatsapp://send?phone={{ $item->contact_no }}&text={{ urlencode(
                                "Dear " . $item->full_name . ",\n\n" .
                                "Greetings from our recruitment team!\n\n" .
                                "This is a gentle reminder regarding your scheduled interview for the " .
                                $item->applicant_designation . " position.\n\n" .
                                "Kindly ensure that you are available on time for the interview.\n\n" .
                                "Reference: " . $item->reference_name . "\n\n" .
                                "We look forward to speaking with you.\n\n" .
                                "Best Regards,\nHR & Recruitment Team"
                            ) }}" class="btn btn-success btn-sm" target="_blank">
                                        <i class="bi bi-whatsapp"></i> Reminder
                                    </a>

                                    <!-- <i class="bi bi-envelope"></i> -->

                                    <!-- @else
                                         <a class="btn btn-success btn-sm" style="cursor: not-allowed;">
                                           <i class="bi bi-whatsapp"></i> Reminder
                                         </a>
                                         @endif -->
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>

    @else

        {{ abort(404) }}

    @endif

    <form action="{{ route('export_selected_records') }}" method="POST" id="exportForm" style="display:none;">

        @csrf
        <div id="exportIds"></div>

    </form>

    <div class="modal modal-lg fade" id="addrecordsModal" tabindex="-1" aria-labelledby="addrecdModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">
                        Fill the Candidate Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row m-0 p-0">
                            <div class="col-md-6">
                                <label for="">Candidate Name: </label>
                                <input type="text" name="can_name" class="form-control" required>

                                <label for="">Email: </label>
                                <input type="email" name="can_email" class="form-control" required>

                                <label for="">Contact: </label>
                                <input type="text" name="can_contact" class="form-control" required>

                                <label for="">Designation: </label>
                                <input type="text" name="can_designation" class="form-control" required>

                                <label for="">Prefered Job Location: </label>
                                <textarea name="can_exp" class="form-control" required></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="">Last Salary: </label>
                                <input type="text" name="can_last_sal" class="form-control">

                                <label for="">Expected Salary: </label>
                                <input type="text" name="can_exp_sal" class="form-control" required>

                                <label for="">Experience: </label>
                                <input type="text" name="can_exp" class="form-control" required>

                                <label for="">Address: </label>
                                <textarea name="can_exp" class="form-control" required></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="">Interview Date: </label>
                                <input type="date" name="interview_date" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Interview Time: </label>
                                <input type="time" name="interview_time" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label for="">HR Name: </label>
                                <input type="text" name="hr_name" class="form-control" value="{{ $item->reference_name }}" readonly>
                            </div>
                        </div>
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
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select All / Unselect All Checkbox
            document.querySelector('.check_all').addEventListener('change', function () {
                let isChecked = this.checked;
                document.querySelectorAll('.candidate_checkbox').forEach(function (checkbox) {
                    checkbox.checked = isChecked;
                });
            });


            // Export All
            // document.querySelector('.export_all').addEventListener('click', function (e) {
            //     e.preventDefault();

            //     document.querySelectorAll('.candidate_checkbox').forEach(function (checkbox) {
            //         checkbox.checked = true;
            //     });

            //     window.location.href = this.href;
            // });


            // Export Selected
            document.querySelector('.export_selected').addEventListener('click', function (e) {
                e.preventDefault();

                const selectedIds = [];

                document.querySelectorAll('.candidate_checkbox:checked').forEach(function (checkbox) {
                    selectedIds.push(checkbox.value);
                });

                if (selectedIds.length === 0) {
                    alert('Please select at least one candidate.');
                    return;
                }

                const exportIds = document.getElementById('exportIds');
                exportIds.innerHTML = '';

                selectedIds.forEach(function (id) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'ids[]';
                    input.value = id;

                    exportIds.appendChild(input);
                });

                document.getElementById('exportForm').submit();
            });

        });
    </script>

@endsection