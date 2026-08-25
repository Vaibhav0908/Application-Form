<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        @if (session()->has('recruiter_name') == "")
            Admin Dashboard
        @else
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
    </style>
</head>

<body>
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-2 m-0 p-0" style="z-index: 100;">
                <!-- Sidebar Overlay (Mobile) -->
                <div class="sidebar-overlay" id="sidebarOverlay"></div>

                <!-- Sidebar -->
                <div class="sidebar-wrapper">

                    <div class="sidebar" id="sidebar">

                        <div class="logo">
                            @if (session()->has('recruiter_name') == "")
                                AdminPanel
                            @else
                                RecruiterPanel
                            @endif
                        </div>

                        <ul class="menu">

                            <li>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                    <i class="bi bi-grid"></i>
                                    <span>Dashboard</span>
                                </a>
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
            </div>

            <div class="col-md-10 m-0 p-0">
                <div class="col-md-12 m-0 p-0 sticky-top">

                    <div class="navbar d-flex justify-content-space-between">

                        <div class="d-md-none justify-content-right m-0 p-0">
                            <span>
                                @if (session()->has('recruiter_name') == "")
                                    AdminPanel
                                @else
                                    RecruiterPanel
                                @endif
                            </span>

                            <button class="menu-toggle text-dark" id="menuToggle">
                                <i class="bi bi-list"></i>
                            </button>
                        </div>

                        <div class="profile">
                            <span>
                                Welcome, {{ session('admin_username') ?: session('recruiter_name') }}
                            </span>
                            <div class="bg-dark p-2 border rounded-circle">
                                <img src="https://tse4.mm.bing.net/th/id/OIP.XKdZgJT9MaVBqYDg-5JlvgAAAA?r=0&rs=1&pid=ImgDetMain&o=7&rm=3"
                                    alt="admin_logo" />
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12">
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

                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="bi bi-person me-2"></i>
                            Profile Settings
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="bi bi-key me-2"></i>
                            Change Password
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="bi bi-palette me-2"></i>
                            Appearance
                            <select name="" id="" class="form-select">
                                <option value="">Ligh</option>
                                <option value="">Dark</option>
                            </select>
                        </a>

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
    </script>
</body>

</html>