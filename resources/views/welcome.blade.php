<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Twiclone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

<div class="min-h-screen grid grid-cols-1 md:grid-cols-2">
    <!-- Linkerkant met logo -->
    <div class="flex items-center justify-center bg-blue-500">
        <svg viewBox="0 0 24 24" fill="white" class="w-36 h-36">
            <path d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0016.5 3a4.5 4.5 0 00-4.36 5.5A12.94 12.94 0 013 4.11a4.49 4.49 0 001.39 6A4.48 4.48 0 012 9.71v.05A4.5 4.5 0 004.5 14a4.48 4.48 0 01-2.03.08A4.5 4.5 0 006.5 17a9 9 0 01-6.5 1.8A12.8 12.8 0 007.5 21c9.14 0 14.3-7.72 14-14.65A10 10 0 0023 3z" />
        </svg>
    </div>

    <!-- Rechterkant met login/register -->
    <div class="flex flex-col items-start justify-center px-10">
        <h1 class="text-5xl font-bold mb-8">Happening now</h1>
        <h2 class="text-2xl font-semibold mb-6">Join Twiclone today.</h2>

        <a href="{{ route('register') }}"
           class="bg-blue-500 text-white px-6 py-3 rounded-full font-semibold mb-4 text-center hover:bg-blue-600 transition">
            Create account
        </a>

        <p class="text-gray-600 text-sm mb-2">Already have an account?</p>

        <a href="{{ route('login') }}"
           class="border border-blue-500 text-blue-500 px-6 py-2 rounded-full font-semibold text-center hover:bg-blue-50 transition">
            Sign in
        </a>
    </div>
</div>

</body>
</html>
