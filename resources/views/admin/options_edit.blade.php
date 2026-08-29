@extends('admin.com_layout')

@section('content')
    @if (isset($platform))
        <div class="modal-header">
            <h5 class="modal-title" id="settingsModalLabel">
                Edit the Platform Details
            </h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('platform.edit_submit') }}" method="post">
                @csrf
                <label for="">Platform Name: </label>
                <input type="hidden" name="id" value="{{ $platform->id }}">
                <input type="text" name="plat_name" class="form-control" value="{{ $platform->platform_name }}">
                <label for="">Status: </label> <br>
                <input type="radio" name="plat_status" value="Active" {{ $platform->status == 'Active' ? 'checked' : '' }}><span
                    class="text-primary">Active</span>
                <input type="radio" name="plat_status" value="Deactive" {{ $platform->status == 'Deactive' ? 'checked' : '' }}><span class="text-danger">Deactive</span>
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

    @elseif (isset($nation))
        <div class="modal-header">
            <h5 class="modal-title" id="settingsModalLabel">
                Edit the Nation Details
            </h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('nation.edit_submit') }}" method="post">
                @csrf
                <label for="">Nation Name: </label>
                <input type="hidden" name="id" value="{{ $nation->id }}">
                <input type="text" name="nat_name" class="form-control" value="{{ $nation->nation }}">
                <label for="">Status: </label> <br>
                <input type="radio" name="nat_status" value="Active" {{ $nation->status == 'Active' ? 'checked' : '' }}><span
                    class="text-primary">Active</span>
                <input type="radio" name="nat_status" value="Deactive" {{ $nation->status == 'Deactive' ? 'checked' : '' }}><span
                    class="text-danger">Deactive</span>
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

        @elseif (isset($int_status))
        <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">
                        Edit the Interview Status Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('inter_status_save') }}" method="post">
                        @csrf
                        <label for="">Status Name: </label>
                        <input type="hidden" name="id" value="{{ $int_status->id }}">
                        <input type="text" name="inter_name" class="form-control" value="{{ $int_status->interview_status }}">
                        <label for="">Status: </label> <br>
                        <input type="radio" name="inter_status" value="Active" {{ $int_status->status == 'Active' ? 'Checked' : '' }}><span class="text-primary">Active</span>
                        <input type="radio" name="inter_status" value="Deactive" {{ $int_status->status == 'Deactive' ? 'Checked' : '' }}><span class="text-danger">Deactive</span>
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
    @endif

@endsection