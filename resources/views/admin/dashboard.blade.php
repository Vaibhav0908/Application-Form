@extends('admin.com_layout')

@section('content')

  <div class="content">

    <h2>Overview</h2>
    <div class="row m-0 p-0">
      <div class="cards">

        <div class="card appl_card col-md-3">
          <div class="icon bg-primary"><i class="bi bi-people"></i></div>
          <h3>Total Applications</h3>
          @if (session('admin_username'))
            <h2 class="text-primary">
              {{ $total_candi }}
            </h2>
          @elseif (session('recruiter_name'))
            <h2 class="text-primary">
              {{ $total_rec_appl }}
            </h2>
          @endif
        </div>

        <div class="card pending-card col-md-3">
          <div class="icon bg-warning"><i class="bi bi-clock-history"></i></div>
          <h3>Pending</h3>
          @if (session('recruiter_name'))
            <h2 class="text-warning">{{ $total_rec_pendings }}</h2>
          @elseif(session('admin_username'))
            <h2 class="text-warning">{{ $total_adm_pendings }}</h2>
          @endif
        </div>


        @foreach ($statuses as $status)
          <div class="card col-md-3">
            <div class="icon bg-dark"><i class="bi bi-trophy-fill"></i></div>
            <h3>{{ $status->interview_status }}</h3>
            <h2 class="text-dark">{{ $statusCounts[$status->interview_status] ?? 0 }}</h2>
          </div>
        @endforeach

      </div>
    </div>
@endsection