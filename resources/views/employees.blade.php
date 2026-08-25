@extends('admin.com_layout')


@section('content')
    <h2 class="mt-5 mx-5">Company Employees</h2>
    <div class="table-box">
        <table>
            <tr class="table-heading">
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Role/Position</th>
                <th>Status</th>
            </tr>
            <div class="candidate-details">
                @foreach ($employee as $emp)
                        @if ($emp->reference_name == "NA" ? optional($emp->officeworkDetails)->interviewed_by == session('recruiter_name') : $emp->reference_name == session('recruiter_name'))
                            @if (optional($emp->officeworkDetails)->interview_status == 'Select')
                                <tr>
                                    <td>{{ $emp->id }}</td>
                                    <td>{{ $emp->full_name }}</td>
                                    <td>{{ $emp->applicant_designation }}</td>
                                    <td>
                                        <span class="bg-success status">{{ optional($emp->officeworkDetails)->interview_status }}</span>
                                    </td>
                                </tr>

                            @endif
                        
                        @elseif(session('admin_username'))
                            @if (optional($emp->officeworkDetails)->interview_status == 'Select')
                                <tr>
                                    <td>{{ $emp->id }}</td>
                                    <td>{{ $emp->full_name }}</td>
                                    <td>{{ $emp->applicant_designation }}</td>
                                    <td>
                                        <span class="bg-success status">{{ optional($emp->officeworkDetails)->interview_status }}</span>
                                    </td>
                                </tr>
                            @endif
                        @endif
                @endforeach
            </div>
        </table>
    </div>

@endsection