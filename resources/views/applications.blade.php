@extends("admin.com_layout")

@section('content')

    <style>
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

    <h2 class="mt-5 mx-5">Applications</h2>
    <div class="table-box">
        <table>
            <tr class="table-heading">
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Role/Position</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>HR</th>
                <th>Created At</th>
                <th>Last Update</th>
            </tr>

            <div class="candidate-details">
                @foreach ($candidates as $cand)
                    @if ($cand->reference_name == "NA" ? optional($cand->officeworkDetails)->interviewed_by == session('recruiter_name') : $cand->reference_name == session('recruiter_name'))
                        <tr>
                            <td>{{ $cand->id }}</td>
                            <td>
                                <a href="{{ route('admin.candidate.show', $cand->id) }}" target="_blank"
                                    style="text-decoration: dotted;">
                                    {{ $cand->full_name }}
                                </a>
                            </td>
                            <td>{{ $cand->applicant_designation }}</td>

                            @if (optional($cand->officeworkDetails)->interview_status != '')
                                @if (optional($cand->officeworkDetails)->interview_status == 'Pending')
                                    <td><span class="status bg-warning">{{ optional($cand->officeworkDetails)->interview_status }}</span>
                                    </td>
                                @elseif (optional($cand->officeworkDetails)->interview_status == 'Select')
                                    <td><span class="status bg-success">{{ optional($cand->officeworkDetails)->interview_status }}</span>
                                    </td>
                                @elseif (optional($cand->officeworkDetails)->interview_status == 'Hold')
                                    <td><span class="status bg-dark">{{ optional($cand->officeworkDetails)->interview_status }}</span></td>
                                @else
                                    <td><span class="status bg-danger">{{ optional($cand->officeworkDetails)->interview_status }}</span>
                                    </td>
                                @endif
                            @else
                                <td><span class="status bg-warning">Pending</span></td>
                            @endif

                            <td>
                                @if (optional($cand->officeworkDetails)->interview_remarks != "")
                                    <p class="border border-muted rounded p-1 small">
                                        {{ optional($cand->officeworkDetails)->interview_remarks }}
                                    </p>
                                @else
                                    <p>NA</p>
                                @endif
                            </td>

                            <td>
                                @if ($cand->reference_name != "NA")
                                    {{$cand->reference_name}}
                                @elseif($cand->reference_name == "NA" && optional($cand->officeworkDetails)->interviewed_by != "")
                                    {{ optional($cand->officeworkDetails)->interviewed_by }}
                                @else
                                    NA
                                @endif
                            </td>

                            <td>{{$cand->created_at}}</td>

                            <td>
                                @if (optional($cand->officeworkDetails)->updated_at != "")
                                    {{ optional($cand->officeworkDetails)->updated_at }}
                                @else
                                    <p>NA</p>
                                @endif
                            </td>
                        </tr>
                    @elseif(session('admin_username'))
                        <tr>
                            <td>{{ $cand->id }}</td>
                            <td>
                                <a href="{{ route('admin.candidate.show', $cand->id) }}" target="_blank"
                                    style="text-decoration: dotted;">
                                    {{ $cand->full_name }}
                                </a>
                            </td>
                            <td>{{ $cand->applicant_designation }}</td>


                            @if (optional($cand->officeworkDetails)->interview_status != '')
                                @if (optional($cand->officeworkDetails)->interview_status == 'Pending')
                                    <td><span class="status bg-warning">{{ optional($cand->officeworkDetails)->interview_status }}</span>
                                    </td>
                                @elseif (optional($cand->officeworkDetails)->interview_status == 'Select')
                                    <td><span class="status bg-success">{{ optional($cand->officeworkDetails)->interview_status }}</span>
                                    </td>
                                @elseif (optional($cand->officeworkDetails)->interview_status == 'Hold')
                                    <td><span class="status bg-dark">{{ optional($cand->officeworkDetails)->interview_status }}</span></td>
                                @else
                                    <td><span class="status bg-danger">{{ optional($cand->officeworkDetails)->interview_status }}</span>
                                    </td>
                                @endif
                            @else
                                <td><span class="status bg-warning">Pending</span></td>
                            @endif


                            <td>
                                @if (optional($cand->officeworkDetails)->interview_remarks != "")
                                    <p class="border border-muted rounded p-1 small">
                                        {{ optional($cand->officeworkDetails)->interview_remarks }}
                                    </p>
                                @else
                                    <p>NA</p>
                                @endif
                            </td>

                            <td>
                                @if ($cand->reference_name != "NA")
                                    {{$cand->reference_name}}
                                @elseif($cand->reference_name == "NA" && optional($cand->officeworkDetails)->interviewed_by != "")
                                    {{ optional($cand->officeworkDetails)->interviewed_by }}
                                @else
                                    NA
                                @endif
                            </td>

                            <td>{{$cand->created_at}}</td>

                            <td>
                                @if (optional($cand->officeworkDetails)->updated_at != "")
                                    {{ optional($cand->officeworkDetails)->updated_at }}
                                @else
                                    <p>NA</p>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </div>
        </table>
    </div>

@endsection