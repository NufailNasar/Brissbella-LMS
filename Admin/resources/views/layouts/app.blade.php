
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="d-flex">
        <nav class="bg-pink text-white p-3" style="width: 250px; height: 100vh;">
            <h3>Admin Panel</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="/dashboard" class="nav-link text-white">Dashboard</a></li>
                <li class="nav-item"><a href="/courses" class="nav-link text-white">Courses</a></li>
                <li class="nav-item"><a href="/students" class="nav-link text-white">Students</a></li>
                <li class="nav-item"><a href="/lectures" class="nav-link text-white">Lectures</a></li>
            </ul>
        </nav>
        <main class="p-4" style="flex-grow: 1;">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>