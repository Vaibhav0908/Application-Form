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
        }
    </style>

    <h2 class="text-primary mt-5 mx-5">Attendance Panel</h2>
    <div class="table-box">
        <table>
            <tr class="text-dark text-center">
                <th>Date</th>
                <th>Name</th>
                <th>Login Time</th>
                <th>Logout Time</th>
                <th>Overtime</th>
                <th>Status</th>
            </tr>
            @foreach ($attendance as $index => $atte)
                @if (session('recruiter_id') || session('employee_id'))

                    @if ($atte->name == session('recruiter_name') || $atte->name == session('employee_name'))
                        <tr class="text-center">
                            <td>{{ $atte->date->format('d/m/Y') }}</td>
                            <td>{{ $atte->name }}</td>
                            <td>
                                {{ $atte->login_time ? \Carbon\Carbon::parse($atte->login_time)->format('h:i:s A') : '--' }}
                            </td>
                            <td>
                                {{ $atte->logout_time ? \Carbon\Carbon::parse($atte->logout_time)->format('h:i:s A') : '--' }}
                            </td>
                            <td>{{ $atte->overtime }}</td>
                            <td>
                                @if ($atte->status == 'Half Day')
                                    <span class="bg-warning status">{{ ucfirst($atte->status) }}</span>
                                @elseif($atte->status == 'Present')
                                    <span class="bg-success status">{{ ucfirst($atte->status) }}</span>
                                @elseif($atte->status == 'Absent')
                                    <span class="bg-danger status">{{ ucfirst($atte->status) }}</span>
                                @endif
                            </td>
                        </tr>

                    @endif

                @elseif(session('admin_id'))
                    @if ($atte->name == session('admin_username'))
                        @continue
                    @else
                        <tr class="text-center">
                            <td>{{ $atte->date->format('d/m/Y') }}</td>
                            <td>{{ $atte->name }}</td>
                            <td>
                                {{ $atte->login_time ? \Carbon\Carbon::parse($atte->login_time)->format('h:i:s A') : '--' }}
                            </td>
                            <td>
                                {{ $atte->logout_time ? \Carbon\Carbon::parse($atte->logout_time)->format('h:i:s A') : '--' }}
                            </td>
                            <td>{{ $atte->overtime }}</td>
                            <td>
                                @if ($atte->status == 'Half Day')
                                    <span class="bg-warning status">{{ ucfirst($atte->status) }}</span>
                                @elseif($atte->status == 'Present')
                                    <span class="bg-success status">{{ ucfirst($atte->status) }}</span>
                                @elseif($atte->status == 'Absent')
                                    <span class="bg-danger status">{{ ucfirst($atte->status) }}</span>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </table>
    </div>
@endsection