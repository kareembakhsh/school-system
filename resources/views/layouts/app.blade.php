<!DOCTYPE html>
<html>
<head>
    <title>School System</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }

        /* Header */
        header {
            background-color: #007bff; /* Blue background */
            color: white;
            padding: 10px 0;
        }

        nav {
            display: flex;
            justify-content: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 16px;
        }

        nav a:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-radius: 4px;
        }

        /* Main Content */
        main {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        /* Footer */
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('teachers.index') }}">Teachers</a>
            <a href="{{ route('students.index') }}">Students</a>
            <a href="{{ route('classes.index') }}">Classes</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 School System</p>
    </footer>
</body>
</html>
