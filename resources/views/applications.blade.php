@extends("admin.com_layout")

@section('content')
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
            </tr>

            <div class="candidate-details">
                @foreach ($candidates as $cand)
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
                        <td>{{$cand->reference_name}}</td>
                    </tr>
                @endforeach
            </div>
        </table>
    </div>

@endsection