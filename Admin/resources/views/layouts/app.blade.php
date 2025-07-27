<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
</head>
<body>
    <header class="bg-white shadow-sm py-2 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-pink font-weight-bold"></h5>
        <div>
            <span class="text-muted">Welcome, Admin</span>
        </div>
    </header>

    <div class="d-flex">
        <nav class="sidebar bg-pink text-white p-3">
            <h3 class="text-center mb-4">Brissbella Academy Admin</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="/dashboard" class="nav-link text-white">🏠 Dashboard</a></li>
                <li class="nav-item"><a href="/courses" class="nav-link text-white">📚 Courses</a></li>
                <li class="nav-item"><a href="/lectures" class="nav-link text-white">👨‍🏫 Lectures</a></li>
                <li class="nav-item"><a href="/students" class="nav-link text-white">👩‍🎓 Students</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">⚙️ Settings</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">📩 Messages</a></li>
                <li class="nav-item mt-auto"><hr><p class="small">Logged in as Admin</p></li>
            </ul>
        </nav>
        <div class="main-content d-flex flex-column w-100">
            <main class="p-4 flex-grow-1">
                @yield('content')
            </main>
            <footer class="footer bg-light text-center py-3">
                &copy; 2025 BrissBella Admin Panel. All rights reserved.
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>

