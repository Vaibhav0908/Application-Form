<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        @if (session('admin_username'))
            Admin Dashboard
        @elseif(session('recruiter_name'))
            Recruiter Dashboard
        @endif
    </title>

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

        .dark_body {
            background: #2f3950 !important;
            color: #393a3a !important;
        }

        .dark_body .card,
        .dark_body .modal-content,
        .dark_body .table-box,
        .dark_body .navbar {
            background: #1f2937;
            color: white;
            /* color: #393a3a; */
        }
    </style>
</head>

<body class="">
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-md-2 m-0 p-0">
                <div class="sidebar-overlay" id="sidebarOverlay"></div>

                <div class="sidebar p-3" id="sidebar">
                    <div class="logo">
                        @if (session('admin_username'))
                            AdminPanel
                        @else
                            RecruiterPanel
                        @endif
                    </div>
                    <ul class="menu">
                        <li>
                            @if (session('admin_username'))
                                <a href="{{ route('admin.dashboard') }}"
                                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                    <i class="bi bi-grid"></i>
                                    <span>Dashboard</span>
                                </a>
                            @elseif(session('recruiter_name'))
                                <a href="{{ route('recruiters.dashboard') }}"
                                    class="{{ request()->routeIs('recruiters.dashboard') ? 'active' : '' }}">
                                    <i class="bi bi-grid"></i>
                                    <span>Dashboard</span>
                                </a>
                            @endif
                        </li>
                        @if (session('admin_username'))
                            <li>
                                <a href="{{ route('control_panel') }}"
                                    class="{{ request()->routeIs('control_panel') ? 'active' : '' }}">
                                    <i class="bi bi-people"></i>
                                    <span>Control Panel</span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('employee') }}"
                                class="{{ request()->routeIs('employee') ? 'active' : '' }}">
                                <i class="bi bi-person-vcard"></i>
                                <span>Employees</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('applications') }}"
                                class="{{ request()->routeIs('applications') ? 'active' : '' }}">
                                <i class="bi bi-file-earmark-text"></i>
                                <span>Applications</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bi bi-bar-chart"></i>
                                <span>Reports</span>
                            </a>
                        </li>
                        <li>
                            <a href="" data-bs-toggle="modal" data-bs-target="#settingsModal">
                                <i class="bi bi-gear"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="col-md-10 m-0 p-0">
                <div class="col-12 m-0 p-0 sticky-top">
                    <div class="navbar ">
                        <div class="profile d-flex align-items-center">
                            <div class="d-md-none d-flex align-items-center">
                                <button class="menu-toggle text-dark" id="menuToggle">
                                    <i class="bi bi-list"></i>
                                </button>
                            </div>

                            <div class="d-flex align-items-center ms-auto">
                                <span>
                                    Welcome, {{ session('admin_username') ?: session('recruiter_name') }}
                                </span>

                                <div class="ms-2">
                                    @if (session('admin_username'))
                                        <a href="" data-bs-toggle="modal" data-bs-target="#profileModal" title="Profile">
                                            <img src="{{ asset('storage/' . session('admin_logo')) }}" alt="admin_logo"
                                                class="rounded-circle p-1">
                                        </a>
                                    @elseif('recruiter_name')
                                        <img src="https://tse4.mm.bing.net/th/id/OIP.XKdZgJT9MaVBqYDg-5JlvgAAAA?r=0&rs=1&pid=ImgDetMain&o=7&rm=3"
                                            alt="admin_logo" class="rounded-circle bg-dark p-1">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 m-0 p-0">
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
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

    <!-- Settings Modal -->
    <div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">
                        <i class="bi bi-gear me-2"></i>
                        Settings
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group">
                        <!-- <form action="" method="post"> -->
                        <!-- @csrf -->
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="bi bi-palette me-2"></i>
                            Appearance
                            <!-- <select name="" id="" class="form-select"> -->
                            <!-- <option value="">Ligh</option> -->
                            <button type="button" id="darkModeBtn" class="btn btn-dark">
                                Dark
                            </button>
                            <button type="button" id="lightModeBtn" class="btn btn-light border-dark">
                                Light
                            </button>
                            <!-- </select> -->
                        </a>
                        <!-- </form> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Profile Update Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">
                        <i class="bi bi-person me-2"></i>
                        Edit Profile
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group">
                        <form action="{{ route('admin_profile_edit')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ session('admin_id') }}">

                            <label for="admin_name">Name:</label>
                            <input type="text" id="admin_name" name="admin_name" class="form-control"
                                value="{{ session('admin_username') }}" required>

                            <label for="admin_email">Email:</label>
                            <input type="email" id="admin_email" name="admin_email" class="form-control"
                                value="{{ session('email') }}" readonly>

                            <label for="admin_password">Password:</label>
                            <input type="password" id="admin_password" name="admin_password" class="form-control"
                                placeholder="Enter new password">

                            <label for="admin_conf_pass">Confirm Password:</label>
                            <input type="password" id="admin_conf_pass" name="admin_conf_pass" class="form-control"
                                placeholder="Confirm new password">

                            <label for="admin_logo">Admin Logo:</label>
                            <input type="file" id="admin_logo" name="admin_logo" class="form-control"
                                accept=".jpg,.jpeg,.png,.jfif,.webp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        Update
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure, you want to Log Out?
                </div>
                <div class="modal-footer">

                    <a href="{{ session()->has('recruiter_id') ? route('recruiter.logout') : route('admin.logout') }}"
                        class="btn btn-success">
                        <span>Yes</span>
                    </a>

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        No
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        const menuToggle = document.getElementById("menuToggle");
        const sidebar = document.getElementById("sidebar");
        const sidebarOverlay = document.getElementById("sidebarOverlay");

        menuToggle.addEventListener("click", function () {
            sidebar.classList.toggle("show");
            sidebarOverlay.classList.toggle("show");
        });

        sidebarOverlay.addEventListener("click", function () {
            sidebar.classList.remove("show");
            sidebarOverlay.classList.remove("show");
        });



        const darkModeBtn = document.getElementById('darkModeBtn');
        const lightModeBtn = document.getElementById('lightModeBtn');

        // Apply saved mode
        if (localStorage.getItem('darkMode') === 'true') {
            document.body.classList.add('dark_body');
        }

        if (localStorage.getItem('darkMode') === 'false') {
            document.body.classList.remove('dark_body');
        }

        darkModeBtn.addEventListener('click', function () {
            document.body.classList.add('dark_body');
            localStorage.setItem('darkMode', 'true');
            localStorage.setItem('lightMode', 'false');
        });

        lightModeBtn.addEventListener('click', function () {
            document.body.classList.remove('dark_body');
            localStorage.setItem('darkMode', 'false');
            localStorage.setItem('lightMode', 'true');
        });

    </script>
</body>

</html>