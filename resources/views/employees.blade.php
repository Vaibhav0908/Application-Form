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
                    @if (optional($emp->officeworkDetails)->interview_status == 'Select')
                        <tr>
                            <td>{{ $emp->id }}</td>
                            <td>{{ $emp->full_name }}</td>
                            <td>{{ $emp->applicant_designation }}</td>
                            <td><span class="bg-success status">{{ optional($emp->officeworkDetails)->interview_status }}</span></td>
                        </tr>
                    @endif
                @endforeach
            </div>
        </table>
    </div>

@endsection