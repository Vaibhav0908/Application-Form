@extends('admin.com_layout')

@section('content')

    <style>
        table th,
        table td {
            text-align: center;
        }
    </style>

    <!--Required Recruiters Block -->

    <div class="row align-items-center py-1 mt-5 mx-4 mx-md-5">
        <div class="col-12 col-md-6">
            <h2 class="text-primary fw-bold mb-0">
                Recruiters Panel
            </h2>
        </div>

        <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
            <a href="#" data-bs-toggle="modal" data-bs-target="#addrecModal" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                Add HR
            </a>
        </div>
    </div>
    <div class="table-box">
        <table>
            <tr class="table-heading text-dark">
                <th>Sr No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Status</th>
                <th>Last Seen</th>
                <th>Action</th>
            </tr>

            <div class="recruiter-details">
                @foreach ($recruiter as $index => $rec)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>{{ $rec->name }}</td>

                        <td>{{ $rec->email }}</td>

                        <td>
                            <div class="input-group">
                                <input type="password" id="password-{{ $rec->id }}" value="{{ $rec->password }}"
                                    class="form-control" readonly>

                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="togglePassword({{ $rec->id }}, this)">
                                    <i class="bi bi-eye"></i>
                                </button>

                            </div>
                        </td>
                        <td>
                            @if ($rec->status == "Active")
                                <span class="status bg-success">{{$rec->status}}</span>
                            @elseif($rec->status == "Deactive")
                                <span class="status bg-danger">{{$rec->status}}</span>
                            @else
                                <span class="">{{$rec->status}}</span>
                            @endif
                        </td>
                        <td>{{ $rec->last_seen }}</td>
                        <td>
                            <a href="{{ route('recruiters.edit_panel', $rec->id) }}" class="btn btn-primary"><i
                                    class="bi bi-pencil"></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-delete-url="{{ route('recruiters.delete', $rec->id) }}"
                                class="btn btn-danger delete-btn"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </div>
        </table>
    </div>


    <div class="modal fade" id="addrecModal" tabindex="-1" aria-labelledby="addrecModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">
                        Fill the HR Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route("recruiter_save") }}" method="post">
                        @csrf
                        <label for="">Name: </label>
                        <input type="text" name="rec_name" class="form-control" required>
                        <label for="">Email: </label>
                        <input type="email" name="rec_email" class="form-control" required>
                        <label for="">Password: </label>
                        <input type="password" name="rec_password" class="form-control" required>
                        <label for="">Status: </label> <br>
                        <input type="radio" name="rec_status" value="Active"><span class="text-primary">Active</span>
                        <input type="radio" name="rec_status" value="Deactive"><span class="text-danger">Deactive</span>
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


    <!-- Delete Modal -->
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