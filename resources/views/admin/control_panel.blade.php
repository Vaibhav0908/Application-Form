@extends('admin.com_layout')

<style>
    table th,
    table td {
        text-align: center;
    }
</style>

@section('content')

    @if (session('success'))
        <div id="successAlert" class="alert alert-success position-fixed top-1 end-0 z-3 ">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>

        <script>
            setTimeout(() => {
                document.getElementById('successAlert')?.remove();
            }, 5000);
        </script>
    @endif

    <!--Required Recruiters Block -->

    <div class="row align-items-center py-1 mt-5 mx-4 mx-md-5">
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
    <div class="table-box">
        <table>
            <tr class="table-heading">
                <th>Sr No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <div class="recruiter-details">
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

    <!--Required Platforms Block -->

    <div class="row align-items-center py-1 mt-5 mx-4 mx-md-5">
        <div class="col-12 col-md-6">
            <h2 class="text-primary fw-bold mb-0">
                Platforms Panel
            </h2>
        </div>

        <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
            <a href="" data-bs-toggle="modal" data-bs-target="#addplatModal" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                Add Platforms
            </a>
        </div>
    </div>
    <div class="table-box">
        <table>
            <tr class="table-heading">
                <th>Sr No.</th>
                <th>Platforms</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <div class="recruiter-details">
                @foreach ($platforms as $plat)
                    <tr>
                        <td>{{ $plat->id }}</td>

                        <td>{{ $plat->platform_name }}</td>

                        <td>
                            @if ($plat->status == "Active")
                                <span class="status bg-success">{{$plat->status}}</span>
                            @elseif($plat->status == "Deactive")
                                <span class="status bg-danger">{{$plat->status}}</span>
                            @else
                                <span class="">{{$plat->status}}</span>
                            @endif
                        </td>

                        <td><button class="btn btn-primary">Edit</button> <button type="reset"
                                class="btn btn-danger">Delete</button></td>
                    </tr>
                @endforeach
            </div>
        </table>
    </div>


    <div class="modal fade" id="addplatModal" tabindex="-1" aria-labelledby="addplatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">
                        Fill the Platform Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('platform_save') }}" method="post">
                        @csrf
                        <label for="">Platform Name: </label>
                        <input type="text" name="plat_name" class="form-control" required>
                        <label for="">Status: </label> <br>
                        <input type="radio" name="plat_status" value="Active"><span class="text-primary">Active</span>
                        <input type="radio" name="plat_status" value="Deactive"><span class="text-danger">Deactive</span>
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


    <!--Required Nations Block -->

    <div class="row align-items-center py-1 mt-5 mx-4 mx-md-5">
        <div class="col-12 col-md-6">
            <h2 class="text-primary fw-bold mb-0">
                Nations Panel
            </h2>
        </div>

        <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
            <a href="" data-bs-toggle="modal" data-bs-target="#addnatModal" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                Add Nations
            </a>
        </div>
    </div>
    <div class="table-box">
        <table>
            <tr class="table-heading">
                <th>Sr No.</th>
                <th>Nation Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <div class="recruiter-details">
                @foreach ($nations as $nat)
                    <tr>
                        <td>{{ $nat->id }}</td>

                        <td>{{ $nat->nation }}</td>

                        <td>
                            @if ($nat->status == "Active")
                                <span class="status bg-success">{{$nat->status}}</span>
                            @elseif($nat->status == "Deactive")
                                <span class="status bg-danger">{{$nat->status}}</span>
                            @else
                                <span class="">{{$nat->status}}</span>
                            @endif
                        </td>

                        <td><button class="btn btn-primary">Edit</button> <button type="reset"
                                class="btn btn-danger">Delete</button></td>
                    </tr>
                @endforeach
            </div>
        </table>
    </div>



    <div class="modal fade" id="addnatModal" tabindex="-1" aria-labelledby="addnatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">
                        Fill the Nation Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('nation_save') }}" method="post">
                        @csrf
                        <label for="">Nation Name: </label>
                        <input type="text" name="nat_name" class="form-control" required>
                        <label for="">Status: </label> <br>
                        <input type="radio" name="nat_status" value="Active"><span class="text-primary">Active</span>
                        <input type="radio" name="nat_status" value="Deactive"><span class="text-danger">Deactive</span>
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



    <!--Required Interview Status Block -->

    <div class="row align-items-center py-1 mt-5 mx-4 mx-md-5">
        <div class="col-12 col-md-6">
            <h2 class="text-primary fw-bold mb-0">
                Interview Status Panel
            </h2>
        </div>

        <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
            <a href="" data-bs-toggle="modal" data-bs-target="#addinter_statusModal" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                Add Status
            </a>
        </div>
    </div>
    <div class="table-box">
        <table>
            <tr class="table-heading">
                <th>Sr No.</th>
                <th>Interview Status</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <div class="recruiter-details">
                @foreach ($interview_status as $int_status)
                    <tr>
                        <td>{{ $int_status->id }}</td>

                        <td>{{ $int_status->interview_status }}</td>

                        <td>
                            @if ($int_status->status == "Active")
                                <span class="status bg-success">{{$int_status->status}}</span>
                            @elseif($int_status->status == "Deactive")
                                <span class="status bg-danger">{{$int_status->status}}</span>
                            @else
                                <span class="">{{$int_status->status}}</span>
                            @endif
                        </td>

                        <td><button class="btn btn-primary">Edit</button> <button type="reset"
                                class="btn btn-danger">Delete</button></td>
                    </tr>
                @endforeach
            </div>
        </table>
    </div>


    <div class="modal fade" id="addinter_statusModal" tabindex="-1" aria-labelledby="addinter_statusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">
                        Fill the Interview Status Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('inter_status_save') }}" method="post">
                        @csrf
                        <label for="">Status Name: </label>
                        <input type="text" name="inter_name" class="form-control" required>
                        <label for="">Status: </label> <br>
                        <input type="radio" name="inter_status" value="Active"><span class="text-primary">Active</span>
                        <input type="radio" name="inter_status" value="Deactive"><span class="text-danger">Deactive</span>
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