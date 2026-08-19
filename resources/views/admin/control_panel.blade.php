@extends('admin.com_layout')

@section('content')
    <div class="d-flex justify-content-space-between">
        <h2 class="mt-5 mx-5 text-primary font-bold">Recruiters Panel</h2>
        <div>
            <a href="#" class="btn btn-primary">Add HR</a>
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

            <div class="candidate-details">
                @foreach ($recruiter as $rec)
                    <tr>
                        <td>{{ $rec->id }}</td>
                        <td>
                            <a href="" target="_blank" style="text-decoration: dotted;">
                                {{ $rec->name }}
                            </a>
                        </td>
                        <td>{{ $rec->email }}</td>

                        <td>{{ $rec->password }}</td>

                        <td>{{$rec->status}}</td>

                        <td><button>Edit</button><button>Delete</button></td>
                    </tr>
                @endforeach
            </div>
        </table>
    </div>
@endsection