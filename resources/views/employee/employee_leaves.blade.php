@extends('admin.com_layout')

@section('content')

    <style>
        .dark_body label {
            color: white;
        }

        .b-dark {
            box-shadow: 0px 0px 12px 1px black;
        }

        .table-box {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            height: 575px;
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

    <div class="row align-items-center py-1 mt-5 mx-4 mx-md-5">
        <div class="col-12 col-md-6">
            <h2 class="text-primary fw-bold mb-0">
                Leaves Panel
            </h2>
        </div>

        <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
            <a href="" data-bs-toggle="modal" data-bs-target="#addleaveModal" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                Apply For Leaves
            </a>
        </div>
    </div>

    <div class="table-box">
        <table>
            <tr class="table-heading text-dark">
                <th>Sr No.</th>
                <th>Leave Type</th>
                <th>Days</th>
                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
                <th>Response</th>
                <th>Status</th>
            </tr>

            <div>
                @foreach ($leave as $index => $leav)
                    @if ($leav->employee_id == session('employee_id'))
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $leav->leave_type }}</td>

                            @if ($leav->leave_type == 'Half Day')
                                <td>-</td>
                                <td>{{ $leav->half_day_date->format('d-m-y') }}</td>
                                <td>{{ $leav->time }}</td>
                            @elseif ($leav->leave_type == 'Paid Leave')
                                <td>-</td>
                                <td>{{ $leav->paid_day_date->format('d-m-y') }}</td>
                                <td>-</td>
                            @elseif ($leav->leave_type == 'Full Day')
                                <td>-</td>
                                <td>{{ $leav->full_day_date->format('d-m-y') }}</td>
                                <td>-</td>
                            @elseif ($leav->leave_type == 'Multiple Days')
                                <td>{{ $leav->days }}</td>
                                <td>
                                    <div class="row m-0 p-0">
                                        <div class="col-12 m-0 p-0">
                                            <span class="text-primary">Start Date</span><br>{{ $leav->start_date->format('d-m-y') }}
                                        </div> <span class="justify-content-center">to</span>
                                        <div class="col-12 m-0 p-0">
                                            <span class="text-warning">End Date</span><br>{{ $leav->end_date->format('d-m-y') }}
                                        </div>
                                    </div>
                                </td>
                                <td>-</td>
                            @endif

                            <td>
                                <div
                                    style="width: 300px; max-height: 100px; overflow-y: auto; overflow-x: hidden; border: 1px solid white;
                                                            border-radius: 5px; padding: 8px; font-size: 14px; white-space: normal; word-wrap: break-word;">
                                    {{ $leav->reason }}
                                </div>
                            </td>
                            <td>
                                @if ($leav->response)
                                    <div
                                        style="width: 300px; max-height: 100px; overflow-y: auto; overflow-x: hidden; border: 1px solid white;
                                                                border-radius: 5px; padding: 8px; font-size: 14px; white-space: normal; word-wrap: break-word;">
                                        {{ $leav->response }}
                                    </div>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($leav->status != '')
                                    @if ($leav->status == 'Aprove')
                                        <span class="status bg-success">{{ $leav->status }}</span>

                                    @elseif ($leav->status == 'Reject')
                                        <span class="status bg-danger">{{ $leav->status }}</span>
                                    @endif
                                @else
                                    <span class="status bg-warning">Inprogress</span>
                                @endif
                            </td>
                        </tr>

                    @endif
                @endforeach
            </div>
        </table>
    </div>

    <div class="modal modal-lg fade" id="addleaveModal" tabindex="-1" aria-labelledby="addleaveModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">
                        Fill Leave Form
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employee.apply_leaves') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($employee as $emplo)
                            @if ($emplo->name == session('employee_name'))
                                <div class="row m-0 p-0">
                                    <div class="col-6 mt-2">
                                        <label for="" class="mx-2 mb-2">Name: </label>
                                        <input type="text" class="form-control" value="{{ $emplo->name }}" name="emp_name" id="">

                                        <label for="" class="mx-2 mb-2">Designation: </label>
                                        <input type="text" class="form-control" value="{{ $emplo->designation }}"
                                            name="emp_designation" id="">

                                        <label for="" class="mx-2 mb-2">Department: </label>
                                        <input type="text" class="form-control" value="{{ $emplo->department }}"
                                            name="emp_department" id="">

                                    </div>
                                    <div class="col-6 mt-2">
                                        <label for="" class="mx-2 mb-2">Employee ID: </label>
                                        <input type="text" class="form-control" value="{{ $emplo->id }}" name="emp_id" id="">

                                        <label for="" class="mb-2 d-flex justify-content-center">Leave Type </label>
                                        <div class="row border border-light rounded bg-light text-dark">
                                            <div class="col-md-4 p-1">
                                                <input type="radio" style="cursor: pointer;" name="leave_type" id="paid_leave"
                                                    value="Paid Leave"> Paid Leave
                                            </div>
                                            <div class="col-md-4 p-1">
                                                <input type="radio" style="cursor: pointer;" name="leave_type" id="half_leave"
                                                    value="Half Day"> Half Day
                                            </div>
                                            <div class="col-md-4 p-1">
                                                <input type="radio" style="cursor: pointer;" name="leave_type" id="full_leave"
                                                    value="Full Day"> Full Day
                                            </div>
                                            <div class="col-md-6 p-1">
                                                <input type="radio" style="cursor: pointer;" name="leave_type" id="multiple_leave"
                                                    value="Multiple Days">
                                                Multiple Days
                                            </div>
                                        </div>

                                    </div>

                                    <div class="leave_dates_block">
                                        <div id="paid_day_block" class="d-none mt-2">
                                            <label for="" class="mb-2 mx-2">Date: </label>
                                            <input type="date" class="form-control" name="paid_day_date" id="">
                                        </div>

                                        <div id="full_day_block" class="d-none mt-2">
                                            <label for="" class="mb-2 mx-2">Date: </label>
                                            <input type="date" class="form-control" name="full_day_date" id="">
                                        </div>

                                        <div id="half_day_block" class="d-none mt-2">
                                            <div class="row">
                                                <div class="col-md-6 mt-1">
                                                    <label for="" class="mb-2 d-flex justify-content-center">Date: </label>
                                                    <input type="date" class="form-control" name="half_day_date" id="">
                                                </div>
                                                <div class="col-md-6 mt-1">
                                                    <label for="" class="mb-2 d-flex justify-content-center">Time: </label>
                                                    <div class="border border-light rounded lg bg-white text-dark p-1">
                                                        <input type="radio" style="cursor: pointer;" class="" name="time" id=""
                                                            value="09 AM to 01 PM"> 09 AM to 01 PM
                                                        <input type="radio" style="cursor: pointer;" class="" name="time" id=""
                                                            value="01 PM to 06 PM"> 01 PM to 06 PM
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="multi_days_block" class="d-none mt-1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="" class="mx-2 mt-1 mb-2">For how much Day's?</label>
                                                    <input type="number" class="form-control" name="days" id="days_count">
                                                </div>

                                                <div class="col-4 mt-1">
                                                    <label for="" class="mb-2 d-flex justify-content-center">Start Date:
                                                    </label>
                                                    <input type="date" class="form-control" name="start_date" id="start_date">
                                                </div>

                                                <div class="col-4 mt-1">
                                                    <label for="" class="mb-2 d-flex justify-content-center">End Date: </label>
                                                    <input type="date" class="form-control" name="end_date" id="end_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="" class="mx-2 mb-2">Reason For Leave: </label>
                                        <textarea name="reason" class="form-control" id=""></textarea>
                                    </div>
                                </div>
                                <div class="d-flex m-4 justify-content-end">
                                    <button type="reset" class="btn btn-outline-danger">Reset</button> &nbsp;
                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                </div>
                            @endif
                        @endforeach
                    </form>
                </div>
            </div>
        </div>

        <script>
            function toggle_leave() {
                const paidLeave = document.getElementById('paid_leave');
                const halfLeave = document.getElementById('half_leave');
                const fullLeave = document.getElementById('full_leave');
                const multipleLeave = document.getElementById('multiple_leave');

                const paidDayBlock = document.getElementById('paid_day_block');
                const fullDayBlock = document.getElementById('full_day_block');
                const halfDayBlock = document.getElementById('half_day_block');
                const multiDaysBlock = document.getElementById('multi_days_block');

                paidDayBlock.classList.add('d-none');
                fullDayBlock.classList.add('d-none');
                halfDayBlock.classList.add('d-none');
                multiDaysBlock.classList.add('d-none');

                if (paidLeave.checked) {
                    paidDayBlock.classList.remove('d-none');
                }
                else if (fullLeave.checked) {
                    fullDayBlock.classList.remove('d-none');
                }
                else if (halfLeave.checked) {
                    halfDayBlock.classList.remove('d-none');
                }
                else if (multipleLeave.checked) {
                    multiDaysBlock.classList.remove('d-none');
                }
            }

            // Listen for radio button changes
            document.querySelectorAll('input[name="leave_type"]').forEach(function (radio) {
                radio.addEventListener('change', toggle_leave);
            });
        </script>
@endsection