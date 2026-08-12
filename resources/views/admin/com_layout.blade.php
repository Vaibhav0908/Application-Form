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
                <a href="{{ route('admin.dashboard') }}" class="active"><i class="bi bi-grid"></i>Dashboard</a>
            </li>

            <li>
                <a href="#"><i class="bi bi-people"></i>Users</a>
            </li>

            <li>
                <a href="#"><i class="bi bi-person-vcard"></i>Employees</a>
            </li>

            <li>
                <a href="{{ route('applications') }}"><i class="bi bi-file-earmark-text"></i>Applications</a>
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
    </div>


    <div class="main">

        <div class="navbar">
            <div class="col-12">

                <div class="profile">
                    <span>Welcome, {{ session('admin_username') }}</span>
                    <img src="https://tse4.mm.bing.net/th/id/OIP.XKdZgJT9MaVBqYDg-5JlvgAAAA?r=0&rs=1&pid=ImgDetMain&o=7&rm=3"
                        alt="admin_logo" />
                </div>
            </div>
        </div>

        <div class="col-12">
            @yield('content')
        </div>
    </div>
</body>

</html>