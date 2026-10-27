@extends('admin.com_layout')

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
            text-align: center;
        }
    </style>

    <h2 class="text-primary mt-5 mx-5">Employee <span class="text-danger">Leaves Management</span> System</h2>
    <div class="table-box">
        <table>
            <tr class="table-heading text-dark">
                <th>Sr No.</th>
                <th>Employee Name</th>
                <th>Leave Type</th>
                <th>Days</th>
                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
                <th>Response</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <div>
                @foreach ($leave as $index => $leav)
                    <tr>
                        <td>{{ $leav->count() - $index }}</td>
                        <td>{{ $leav->name }}</td>
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
                        <td>
                            @foreach ($employee as $emp)
                                @if ($leav->employee_id == $emp->id)
                                    @if ($leav->status == 'Reject' || $leav->status == 'Aprove')
                                        <a style="cursor: not-allowed;" class="btn btn-primary response">Response</a>
                                    @else
                                        <a href="{{ route('leaves_reponse_panel', ['id' => $leav->id]) }}"
                                            class="btn btn-primary response">Response</a>
                                    @endif
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </div>
        </table>
    </div>
@endsection