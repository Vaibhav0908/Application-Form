@extends('admin.com_layout')

<style>
    table th,
    table td {
        text-align: center;
    }
</style>

@section('content')
    <div class="row align-items-center mt-5 mx-4 mx-md-5">
        <div class="col-12 col-md-6">
            <h2 class="text-primary fw-bold mb-0">
                Recruiters Panel
            </h2>
        </div>

        <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
            <a href="" data-bs-toggle="modal" data-bs-target="#addrecModal" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                Add HR
            </a>
        </div>
    </div>
    <div class="">
        <table>
            <tr class="table-heading">
                <th>Sr No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <div class="candidate-details">
                @foreach ($recruiter as $rec)
                    <tr>
                        <td>{{ $rec->id }}</td>

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

                        @if ($rec->status == "Active")
                            <td><span class="status bg-success">{{$rec->status}}</span></td>
                        @elseif($rec->status == "Deactive")
                            <td><span class="status bg-danger">{{$rec->status}}</span></td>
                            @else
                            <td><span class="">{{$rec->status}}</span></td>
                        @endif

                        <td><button class="btn btn-primary">Edit</button> <button type="reset"
                                class="btn btn-danger">Delete</button></td>
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
                        <!-- <i class="bi bi-box-arrow-right"></i> -->
                        Fill the HR Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route("recruiter_save") }}" method="post">
                        @csrf
                        <label for="">Name</label>
                        <input type="text" name="rec_name" class="form-control" required>
                        <label for="">Email</label>
                        <input type="email" name="rec_email" class="form-control" required>
                        <label for="">Password</label>
                        <input type="password" name="rec_password" class="form-control" required>
                        <label for="">Status</label>
                        <input type="radio" name="rec_status" value="Active">Active
                        <input type="radio" name="rec_status" value="Deactive">Deactive

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
    </script>
@endsection