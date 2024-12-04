<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Platform</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #e0eafc, #cfdef3);
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(8px);
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn {
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background: rgba(0, 123, 255, 0.8);
            color: #fff;
        }
        .btn-primary:hover {
            background: rgba(0, 123, 255, 1);
            transform: scale(1.05);
        }
        footer {
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Blog Platform</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            Notifications ({{ auth()->user()->unreadNotifications->count() }})
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach(auth()->user()->unreadNotifications as $notification)
                                <li>
                                    <a class="dropdown-item" href="{{ url('/posts/' . $notification->data['post_id']) }}">
                                        {{ $notification->data['message'] }}
                                    </a>
                                </li>
                            @endforeach
                            @if(auth()->user()->unreadNotifications->isEmpty())
                                <li><a class="dropdown-item">No notifications</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

    <div class="container mt-4">
        @yield('content')
    </div>
    <footer>
        &copy; {{ date('Y') }} Blog Platform. All rights reserved.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
