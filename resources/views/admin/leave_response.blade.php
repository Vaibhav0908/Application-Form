@extends('admin.com_layout')

@section('content')
    <style>
        .dark_body .box p,
        .dark_body .box span {
            color: white;
        }

        .box{
            box-shadow: 0px 0px 10px black;
        }
    </style>
    <h2 class="text-primary mt-4 mx-5">Leave Response</h2>

    <div class="row m-0 p-0 my-2 mx-4 border rounded box b-dark">
        <div class="col-6 my-4">
            <p>Employee Name: {{ $leave->name }}</p>
            <p>Employee Email: {{ $employee->email }}</p>
        </div>
        <div class="col-6 my-4">
            <p>Employee ID: {{ $leave->employee_id }}</p>
            <p>Employee Designation: {{ $leave->designation }}</p>
        </div>
        <hr class="text-dark">
        <div class="col-6">
            <p>Application Date: {{ $leave->created_at->format('d-m-Y') }}</p>
            <p>Leave Type: {{ $leave->leave_type}}</p>
        </div>
        <div class="col-6">
            @if ($leave->leave_type == 'Half Day')
                <p>Leave Date: {{ $leave->half_day_date->format('d-m-Y') }}</p>
                <p>Half Day Time: {{ $leave->time }}</p>
            @elseif($leave->leave_type == 'Full Day')
                <p>Leave Date: {{ $leave->full_day_date->format('d-m-Y') }}</p>
            @elseif($leave->leave_type == 'Paid Leave')
                <p>Leave Date: {{ $leave->paid_day_date->format('d-m-Y') }}</p>
            @elseif($leave->leave_type == 'Multiple Days')
                <p>Leave Days: {{ $leave->days }}</p>
                <span>Leave Date: {{ $leave->start_date->format('d-m-Y') }} to {{ $leave->end_date->format('d-m-Y') }}</span>
            @endif

        </div>
        <div class="col-12">
            <p class="m-0 p-0">Leave Reason: </p>
            <p class="p-2 border border-dark bg-light small text-dark rounded">{{ $leave->reason }}</p>
        </div>

        <hr>

        <form action="{{ route('leaves_response')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row m-0 p-0">
                <div class="col-12 m-0 p-0 mb-2">
                    <input type="hidden" name="id" value="{{ $leave->id }}">
                    <p>Admin Response: <span class="small">(*optional)</span></p>
                    <textarea name="response" {{ $leave->response }} class="form-control" id="">{{ $leave->response }}</textarea>
                </div>

                <div class="col-12 m-0 p-0">
                    <sup class="text-danger">*</sup><span>Status: </span>
                    &nbsp;<input type="radio" style="cursor: pointer;" name="status" value="Reject" required {{ $leave->status == 'Reject' ? 'checked' : '' }}><span
                        class="text-danger">Reject</span> &nbsp;
                    <input type="radio" style="cursor: pointer;" name="status" value="Aprove" required {{ $leave->status == 'Aprove' ? 'checked' : '' }}><span
                        class="text-success">Aprove</span>
                </div>

                <div class="d-flex my-3 justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection