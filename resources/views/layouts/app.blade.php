<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            line-height: 1.5;
        }
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.75rem 1.5rem;
        }
        .navbar-inner {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .brand {
            font-weight: 600;
            font-size: 1rem;
            color: #0f172a;
            text-decoration: none;
        }
        .nav-links {
            display: flex;
            gap: 0.5rem;
        }
        .nav-link {
            padding: 0.4rem 0.75rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            color: #475569;
        }
        .nav-link:hover {
            background-color: #f1f5f9;
            color: #0f172a;
        }
        .nav-link.active {
            background-color: #0f172a;
            color: #ffffff;
        }
        .container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        .card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1.5rem;
        }
        .header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }
        .header-row h1 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }
        th, td {
            text-align: left;
            padding: 0.75rem 0.75rem;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: top;
        }
        th {
            font-weight: 600;
            color: #475569;
            background-color: #f8fafc;
        }
        tr:last-child td {
            border-bottom: none;
        }
        .actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .actions form {
            margin: 0;
        }
        .btn {
            display: inline-block;
            padding: 0.45rem 0.85rem;
            border-radius: 6px;
            font-size: 0.8125rem;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid transparent;
            line-height: 1.2;
        }
        .btn-primary {
            background-color: #0f172a;
            color: #ffffff;
        }
        .btn-primary:hover {
            background-color: #1e293b;
        }
        .btn-secondary {
            background-color: #ffffff;
            color: #0f172a;
            border-color: #cbd5e1;
        }
        .btn-secondary:hover {
            background-color: #f8fafc;
        }
        .btn-danger {
            background-color: #dc2626;
            color: #ffffff;
        }
        .btn-danger:hover {
            background-color: #b91c1c;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.35rem;
            color: #334155;
        }
        .form-control {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.875rem;
            font-family: inherit;
        }
        .form-control:focus {
            outline: none;
            border-color: #0f172a;
        }
        .empty-state {
            text-align: center;
            color: #64748b;
            padding: 2rem 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-inner">
            <a href="{{ url('/') }}" class="brand">{{ config('app.name', 'Laravel') }}</a>
            <div class="nav-links">
                <a href="{{ route('customer-list') }}" class="nav-link {{ request()->routeIs('customer-list', 'create-customer', 'edit-customer') ? 'active' : '' }}">
                    Customers
                </a>
                <a href="{{ route('service-list') }}" class="nav-link {{ request()->routeIs('service-list', 'create-service', 'edit-service') ? 'active' : '' }}">
                    Services
                </a>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>
