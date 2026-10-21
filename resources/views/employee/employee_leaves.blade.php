@extends('admin.com_layout')

@section('content')

    <style>
        .dark_body label {
            color: white;
        }

        .border {
            box-shadow: 0px 0px 12px 1px black;
        }
    </style>

    <!-- <h5 class="text-primary mt-5 mx-5">
        Leave Form
    </h5>
    <div class="mt-5 mx-5 border border rounded b-dark">

        <form action="#" method="post" enctype="multipart/form-data">
            @foreach ($employee as $emplo)
                @if ($emplo->name == session('employee_name'))
                    <div class="row m-0 p-0">
                        <div class="col-6 mt-2">
                            <label for="" class="mx-2 mb-2">Name: </label>
                            <input type="text" class="form-control" value="{{ $emplo->name }}" name="" id=""> <br>

                            <label for="" class="mx-2 mb-2">How much Day's? </label>
                            <input type="text" class="form-control" name="" id=""> <br>

                            <div class="row">
                                <div class="col-6">
                                    <label for="" class="mx-2 mb-2 d-flex justify-content-center">Start Date: </label>
                                    <input type="date" class="form-control" name="" id="">
                                </div>

                                <div class="col-6">
                                    <label for="" class="mx-2 mb-2 d-flex justify-content-center">End Date: </label>
                                    <input type="date" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="mx-2 mb-2">Employee ID: </label>
                            <input type="text" class="form-control" value="{{ $emplo->id }}" name="" id=""> <br>

                            <label for="" class="mx-2 mb-2">Designation: </label>
                            <input type="text" class="form-control" value="{{ $emplo->designation }}" name="" id=""> <br>

                            <label for="" class="mx-2 mb-2">Department: </label>
                            <input type="text" class="form-control" value="{{ $emplo->department }}" name="" id=""> <br>
                        </div>

                        <div class="col-12">
                            <label for="" class="mx-2 mb-2">Reason For Leave: </label>
                            <textarea name="" class="form-control" id=""></textarea>
                        </div>
                    </div>
                    <div class="d-flex m-4 justify-content-end">
                        <button type="reset" class="btn btn-outline-danger">Reset</button> &nbsp;
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                @endif
            @endforeach
        </form>

    </div> -->

    <div class="row align-items-center py-1 mt-5 mx-4 mx-md-5">
        <div class="col-12 col-md-6">
            <h2 class="text-primary fw-bold mb-0">
                Leaves Panel
            </h2>
        </div>

        <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
            <a href="" data-bs-toggle="modal" data-bs-target="#addplatModal" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                Apply For Leaves
            </a>
        </div>
    </div>

    <div class="table-box">
        <table>
            <tr class="table-heading text-dark">
                <th>Sr No.</th>
                <th>Platforms</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <div class="recruiter-details">
                @foreach ($employee as $index => $emplo)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>{{ $emplo->name }}</td>

                        <td>
                            @if ($emplo->status == "Active")
                                <span class="status bg-success">{{$emplo->status}}</span>
                            @elseif($emplo->status == "Deactive")
                                <span class="status bg-danger">{{$emplo->status}}</span>
                            @else
                                <span class="">{{$emplo->status}}</span>
                            @endif
                        </td>

                        <td>
                            <a href=""
                                class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-delete-url=""
                                class="btn btn-danger delete-btn"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </div>
        </table>
    </div>

@endsection