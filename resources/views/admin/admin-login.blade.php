<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-light">

        <div class="card shadow-lg border-0 rounded-4" style="max-width: 450px; width: 100%;">

            <div class="card-body p-5">

                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary mb-2">Admin Login</h3>
                    <p class="text-muted mb-0">
                        Sign in to access the admin panel
                    </p>
                </div>

                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">
                            User Name
                        </label>

                        <input type="text" class="form-control form-control-lg" id="username" name="username"
                            placeholder="Enter your username" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">
                            Password
                        </label>

                        <input type="password" class="form-control form-control-lg" id="password" name="password"
                            placeholder="Enter your password" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Login
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</body>

</html>