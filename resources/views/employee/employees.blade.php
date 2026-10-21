@extends('admin.com_layout')


@section('content')

    <style>
        .table-box {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            width: 100%;
            height: 575px;
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

        .input-group {
            width: 210px;
        }
    </style>

    <div class="row align-items-center py-1 mt-5 mx-4 mx-md-5">
        <div class="col-12 col-md-6">
            <h2 class="text-primary fw-bold mb-0">
                Employee's Panel
            </h2>
        </div>

    </div>

    <div class="table-box">
        <table>
            <tr class="table-heading text-dark">
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Role/Position</th>
                <th>Email</th>
                <th>Password</th>
                <th>Last Seen</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <div class="candidate-details">
                @if (session('recruiter_id'))
                    @foreach ($employee as $index => $emp)
                        @if (optional($emp->candidate)->reference_name == 'NA' ? optional(optional($emp->candidate)->officeworkDetails)->interviewed_by == session('recruiter_name') : optional($emp->candidate)->reference_name == session('recruiter_name'))
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><a href="{{ route('employee_details', $emp->id) }}"
                                        style="text-decoration: dotted;">{{ $emp->name }}</a></td>
                                <td>{{  $emp->designation }}</td>
                                <td>{{  $emp->email }}</td>
                                <td>
                                    <div class="input-group">
                                        <input type="password" id="password-{{ $emp->id }}" value="{{ $emp->password }}"
                                            class="form-control" readonly>

                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="togglePassword({{ $emp->id }}, this)">
                                            <i class="bi bi-eye"></i>
                                        </button>

                                    </div>
                                </td>
                                <td>{{ $emp->last_seen }}</td>
                                <td>
                                    @if ($emp->status == 'Active')
                                        <span class="status bg-success">{{  $emp->status }}</span>
                                    @elseif($emp->status == 'Deactive')
                                        <span class="status bg-danger">{{  $emp->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{'/employee/edit/panel/' . $emp->id}}" class="btn btn-primary"><i
                                            class="bi bi-pencil"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        data-delete-url="{{ route('employee.delete', $emp->id) }}" class="btn btn-danger delete-btn"><i
                                            class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                @elseif(session('admin_id'))
                    @foreach ($employee as $index => $emp)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><a href="{{ route('employee_details', $emp->id) }}"
                                    style="text-decoration: dotted;">{{ $emp->name }}</a></td>
                            <td>{{  $emp->designation }}</td>
                            <td>{{  $emp->email }}</td>
                            <td>
                                <div class="input-group">
                                    <input type="password" id="password-{{ $emp->id }}" value="{{ $emp->password }}"
                                        class="form-control" readonly>

                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="togglePassword({{ $emp->id }}, this)">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                </div>
                            </td>
                            <td>{{ $emp->last_seen }}</td>
                            <td>
                                @if ($emp->status == 'Active')
                                    <span class="status bg-success">{{  $emp->status }}</span>
                                @elseif($emp->status == 'Deactive')
                                    <span class="status bg-danger">{{  $emp->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{'/employee/edit/panel/' . $emp->id}}" class="btn btn-primary"><i
                                        class="bi bi-pencil"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    data-delete-url="{{ route('employee.delete', $emp->id) }}" class="btn btn-danger delete-btn"><i
                                        class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </div>
        </table>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">
                        <i class="bi bi-trash"></i>
                        Delete
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure, you want to Delete?
                </div>
                <div class="modal-footer">
                    <a href="" id="confirmDeleteBtn" class="btn btn-success">
                        <span>Yes</span>
                    </a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        No
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        function togglePassword(id, button) {
            const input = document.getElementById('password-' + id);
            const icon = button.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }

        document.querySelectorAll('.delete-btn').forEach(function (button) {
            button.addEventListener('click', function () {

                let deleteUrl = this.dataset.deleteUrl;

                document.getElementById('confirmDeleteBtn').href = deleteUrl;

            });
        });
    </script>

@endsection