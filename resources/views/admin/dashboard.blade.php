<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: #f5f7fb;
      display: flex;
    }
  </style>
</head>

<body>
  <div class="sidebar">
    <div class="logo">AdminPanel</div>

    <ul class="menu">
      <li>
        <a href="#" class="active"><i class="bi bi-grid"></i>Dashboard</a>
      </li>

      <li>
        <a href="#"><i class="bi bi-people"></i>Users</a>
      </li>

      <li>
        <a href="#"><i class="bi bi-person-vcard"></i>Candidates</a>
      </li>

      <li>
        <a href="#"><i class="bi bi-file-earmark-text"></i>Applications</a>
      </li>

      <li>
        <a href="#"><i class="bi bi-bar-chart"></i>Reports</a>
      </li>

      <li>
        <a href="#"><i class="bi bi-gear"></i>Settings</a>
      </li>

      <li>
        <a href="#"><i class="bi bi-box-arrow-right"></i>Logout</a>
      </li>
    </ul>
  </div>

  <div class="main">
    <div class="navbar">
      <!-- <div class="search">
          <input type="text" placeholder="Search..." />
        </div> -->

      <div class="profile">
        <span>Welcome, Admin</span>
        <img src="https://tse4.mm.bing.net/th/id/OIP.XKdZgJT9MaVBqYDg-5JlvgAAAA?r=0&rs=1&pid=ImgDetMain&o=7&rm=3"
          alt="admin_logo" />
      </div>
    </div>

    <div class="content">

      <h2>Overview</h2>
      <div class="row">
        <div class="cards">
          <div class="card col-md-4">
            <div class="icon blue"><i class="bi bi-people"></i></div>
            <h3>Total Applications</h3>
            <h2 class="text-primary">{{$total_candi}}</h2>
          </div>

          <div class="card select-card col-md-4">
            <div class="icon green"><i class="bi bi-person-check"></i></div>
            <h3>Select</h3>
            <h2 class="text-success">{{$total_selections}}</h2>
          </div>

          <div class="card pending-card col-md-4">
            <div class="icon orange"><i class="bi bi-clock-history"></i></div>
            <h3>Pending</h3>
              <h2 class="text-warning">{{ $total_pendings }}</h2>
          </div>

          <div class="card reject-card col-md-4">
            <div class="icon red"><i class="bi bi-person-x"></i></div>
            <h3>Reject</h3>
            <h2 class="text-danger">{{$total_rejections}}</h2>
          </div>
        </div>
      </div>

      <h2 style="margin: 30px 0px 10px 0px">Applications</h2>
      <div class="table-box">
        <table>
          <tr class="table-heading">
            <th>Name</th>
            <th>Role/Position</th>
            <th>Status</th>
            <th>Remarks</th>
            <th>HR</th>
          </tr>

          <div class="candidate-details">
            @foreach ($candidates as $cand)
              <tr>
                <td>
                  <a href="{{ route('admin.candidate.show', $cand->id) }}" style="text-decoration: dotted;">
                    {{ $cand->full_name }}
                  </a>
                </td>
                <td>{{ $cand->applicant_designation }}</td>

                @if (optional($cand->officeworkDetails)->interview_status != '')
                  @if (optional($cand->officeworkDetails)->interview_status == 'Pending')
                    <td><span class="status bg-warning">{{ optional($cand->officeworkDetails)->interview_status }}</span></td>
                  @elseif (optional($cand->officeworkDetails)->interview_status == 'Select')
                    <td><span class="status bg-success">{{ optional($cand->officeworkDetails)->interview_status }}</span></td>
                    @elseif (optional($cand->officeworkDetails)->interview_status == 'On Hold')
                    <td><span class="status bg-dark">{{ optional($cand->officeworkDetails)->interview_status }}</span></td>
                  @else
                    <td><span class="status bg-danger">{{ optional($cand->officeworkDetails)->interview_status }}</span></td>
                  @endif

                @else
                  <td><span class="status pending">Pending</span></td>
                @endif


                <td>
                  <p class="border border-muted rounded p-1 small">
                      {{ optional($cand->officeworkDetails)->interview_remarks }}
                  </p>
                </td>
                <td>{{$cand->reference_name}}</td>
              </tr>
            @endforeach
          </div>
        </table>
      </div>
    </div>
  </div>
</body>

</html>