@extends('admin.com_layout')

@section('content')

  <style>
    .dark_body h3,
    .dark_body p {
      color: white;
    }

  .polly-con{
    font-size: smaller;
  }
  </style>

  <div class="content">

    <h2 class="text-primary fw-bold py-1  mx-4 mx-md-5 ">
      @if (session('admin_username'))
        Admin Overview
      @elseif (session('recruiter_name'))
        Recruiter Overview
      @elseif (session('employee_name'))
        Employee Overview
      @endif
    </h2>

    @if (!session('employee_name'))
      <div class="cards">

        <div class="card appl_card">
          <div class="icon bg-primary"><i class="bi bi-people"></i></div>
          <h3>Total Applications</h3>
          @if (session('admin_username'))
            <h2 class="text-primary">
              3
            </h2>
          @elseif (session('recruiter_name'))
            <h2 class="text-primary">
              6
            </h2>
          @endif
        </div>

        <div class="card pending-card">
          <div class="icon bg-warning"><i class="bi bi-clock-history"></i></div>
          <h3>Pending</h3>
          @if (session('recruiter_name'))
            <h2 class="text-warning">{{ $total_rec_pendings }}</h2>
          @elseif(session('admin_username'))
            <h2 class="text-warning">{{ $total_adm_pendings }}</h2>
          @endif
        </div>

        @foreach ($statuses as $status)
          <div class="card">
            <div class="icon bg-dark"><i class="bi bi-trophy-fill"></i></div>
            <h3>{{ $status->interview_status }}</h3>
            <h2 class="">{{ $statusCounts[$status->interview_status] ?? 0 }}</h2>
          </div>
        @endforeach

      </div>
    @endif

    @if (session('employee_id'))
      <h3 class="text-warning fs-5">Company Policies</h3>
      <p class='polly-con'>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit nemo id possimus perspiciatis, mollitia sunt
        commodi iste molestias consectetur repudiandae quo. Commodi labore vero nesciunt rerum expedita dolorem, similique
        obcaecati!
        Sequi asperiores accusantium nam maxime repudiandae, debitis unde. Consequuntur dolorem quasi debitis accusamus!
        Repellat, sunt enim, corporis quas cupiditate ducimus quia culpa similique est impedit sit. Nihil dolorum odit
        placeat.
        Vitae magnam ratione porro, corrupti quibusdam soluta repudiandae ullam, animi harum laborum fuga incidunt. Ullam
        obcaecati est rem possimus consectetur dignissimos sint veniam, quae nobis ipsum quod officia quisquam? Dolore.
        Est fugit, nobis saepe praesentium iure quia illo, cumque veniam dolor, deleniti aliquam ullam quibusdam excepturi
        numquam. Cumque, dolorem natus repellat eligendi id modi, earum possimus quasi, temporibus amet ipsam.
        Pariatur corporis commodi dignissimos vitae excepturi officia temporibus labore? Cupiditate dolorum voluptatibus
        optio
        quia iusto pariatur nisi porro, libero corporis voluptate neque architecto incidunt facilis sit recusandae quod
        error
        aperiam.
        Inventore doloribus, voluptatibus beatae commodi magnam ratione iusto, sit repellat vero cum dolor animi assumenda
        optio ducimus perferendis distinctio a. Aliquid doloremque sint blanditiis explicabo repudiandae ea quis unde animi.
        Dicta, vel accusantium sed quae earum nisi fugit sint accusamus vitae quaerat quis magnam ad repudiandae, est unde?
      </p>

      <h3 class="text-warning fs-5">Rules & Regulations</h3>
      <p class='polly-con'>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit nemo id possimus perspiciatis, mollitia sunt
        commodi iste molestias consectetur repudiandae quo. Commodi labore vero nesciunt rerum expedita dolorem, similique
        obcaecati!
        Sequi asperiores accusantium nam maxime repudiandae, debitis unde. Consequuntur dolorem quasi debitis accusamus!
        Repellat, sunt enim, corporis quas cupiditate ducimus quia culpa similique est impedit sit. Nihil dolorum odit
        placeat.
        Vitae magnam ratione porro, corrupti quibusdam soluta repudiandae ullam, animi harum laborum fuga incidunt. Ullam
        obcaecati est rem possimus consectetur dignissimos sint veniam, quae nobis ipsum quod officia quisquam? Dolore.
        Est fugit, nobis saepe praesentium iure quia illo, cumque veniam dolor, deleniti aliquam ullam quibusdam excepturi
        numquam. Cumque, dolorem natus repellat eligendi id modi, earum possimus quasi, temporibus amet ipsam.
        Pariatur corporis commodi dignissimos vitae excepturi officia temporibus labore? Cupiditate dolorum voluptatibus
        optio.
      </p>

      <h3 class="text-warning fs-5">About Company</h3>
      <p class='polly-con'>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit nemo id possimus perspiciatis, mollitia sunt
        commodi iste molestias consectetur repudiandae quo. Commodi labore vero nesciunt rerum expedita dolorem, similique
        obcaecati!
        Sequi asperiores accusantium nam maxime repudiandae, debitis unde. Consequuntur dolorem quasi debitis accusamus!
        Repellat, sunt enim, corporis quas cupiditate ducimus quia culpa similique est impedit sit. Nihil dolorum odit
        placeat.
        Vitae magnam ratione porro, corrupti quibusdam soluta repudiandae ullam, animi harum laborum fuga incidunt. Ullam
        obcaecati est rem possimus consectetur dignissimos sint veniam, quae nobis ipsum quod officia quisquam? Dolore.
        Est fugit, nobis saepe praesentium iure quia illo, cumque veniam dolor, deleniti aliquam ullam quibusdam excepturi
        numquam. Cumque, dolorem natus repellat eligendi id modi, earum possimus quasi, temporibus amet ipsam.
        Pariatur corporis commodi dignissimos vitae excepturi officia temporibus labore? Cupiditate dolorum voluptatibus
        optio.
      </p>
    @endif
  </div>
@endsection