@extends('admin.com_layout')

@section('content')

  <div class="content">

    <h2>Overview</h2>
    <div class="row m-0 p-0">
      <div class="cards">
        <div class="card col-md-3">
          <div class="icon bg-primary"><i class="bi bi-people"></i></div>
          <h3>Total Applications</h3>
          <h2 class="text-primary">{{$total_candi}}</h2>
        </div>

        <div class="card select-card col-md-3">
          <div class="icon bg-success"><i class="bi bi-person-check"></i></div>
          <h3>Select</h3>
          <h2 class="text-success">{{$total_selections}}</h2>
        </div>


        <div class="card pending-card col-md-3">
          <div class="icon bg-warning"><i class="bi bi-clock-history"></i></div>
          <h3>Pending</h3>
          <h2 class="text-warning">{{ $total_pendings }}</h2>
        </div>

        <div class="card reject-card col-md-3">
          <div class="icon bg-danger"><i class="bi bi-person-x"></i></div>
          <h3>Reject</h3>
          <h2 class="text-danger">{{$total_rejections}}</h2>
        </div>

        <div class="card reject-card col-md-3">
          <div class="icon bg-dark"><i class="bi bi-person-x"></i></div>
          <h3>On Hold</h3>
          <h2 class="text-dark">{{$total_rejections}}</h2>
        </div>

        <div class="card reject-card col-md-3">
          <div class="icon bg-dark"><i class="bi bi-person-x"></i></div>
          <h3>On Hold</h3>
          <h2 class="text-dark">{{$total_rejections}}</h2>
        </div>
      </div>
    </div>
  </div>
@endsection