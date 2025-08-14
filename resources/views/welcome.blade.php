<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Task Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">

    <div class="min-h-screen flex flex-col justify-center items-center px-4">
        <h1 class="text-4xl font-bold mb-4">Welcome to Task Manager</h1>
        <p class="text-lg text-center mb-6 max-w-xl">
            Organize your tasks, manage projects, and boost your productivity.
        </p>
        <div class="space-x-4">
            <a href="{{ route('login') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                Login
            </a>
            <a href="{{ route('register') }}"
               class="bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white px-4 py-2 rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                Register
            </a>
        </div>
    </div>

</body>
</html>
