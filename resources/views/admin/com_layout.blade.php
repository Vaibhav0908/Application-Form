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
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-2 m-0 p-0" style="z-index: 100;">

                <!-- <div class="sidebar d-none d-md-block">

                    <div class="logo">AdminPanel</div>

                    <ul class="menu">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="active"><i
                                    class="bi bi-grid"></i>Dashboard</a>
                        </li>

                        <li>
                            <a href="#"><i class="bi bi-people"></i>Users</a>
                        </li>

                        <li>
                            <a href="#"><i class="bi bi-person-vcard"></i>Employees</a>
                        </li>

                        <li>
                            <a href="{{ route('applications') }}"><i
                                    class="bi bi-file-earmark-text"></i>Applications</a>
                        </li>

                        <li>
                            <a href="#"><i class="bi bi-bar-chart"></i>Reports</a>
                        </li>

                        <li>
                            <a href="#"><i class="bi bi-gear"></i>Settings</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.logout') }}"><i class="bi bi-box-arrow-right"></i>Logout</a>
                        </li>
                    </ul>
                </div> -->

                <!-- Mobile Navbar -->
                <!-- <div class="mobile-navbar d-md-none">
                    <div class="mobile-logo">
                        AdminPanel
                    </div>

                    <button class="menu-toggle" id="menuToggle">
                        <i class="bi bi-list"></i>
                    </button>
                </div> -->


                <!-- Sidebar Overlay (Mobile) -->
                <div class="sidebar-overlay" id="sidebarOverlay"></div>


                <!-- Sidebar -->
                <div class="sidebar-wrapper">

                    <div class="sidebar" id="sidebar">

                        <div class="logo">
                            AdminPanel
                        </div>

                        <ul class="menu">

                            <li>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                    <i class="bi bi-grid"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="bi bi-people"></i>
                                    <span>Users</span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
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
                                <a href="#">
                                    <i class="bi bi-gear"></i>
                                    <span>Settings</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.logout') }}">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Logout</span>
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>
            </div>

            <div class="col-md-10 m-0 p-0">
                <div class="col-md-12 m-0 p-0">

                    <div class="navbar d-flex justify-content-space-between">

                        <div class="d-md-none justify-content-right m-0 p-0">
                            <span>AdminPanel</span>

                            <button class="menu-toggle text-dark" id="menuToggle">
                                <i class="bi bi-list"></i>
                            </button>
                        </div>

                        <div class="profile">
                            <span>Welcome, {{ session('admin_username') }}</span>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>