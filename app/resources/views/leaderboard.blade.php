<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMaster - Leaderboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <img src="/placeholder.svg?height=40&width=40" alt="QuizMaster Logo" class="h-10 w-10 mr-3">
                <span class="font-bold text-xl">QuizMaster</span>
            </div>
            <div>
                @if (Auth::check())
                    <a href="{{ route('home') }}" class="text-white hover:text-gray-200 mr-4">Home</a>
                    <a href="{{ route('profile') }}" class="text-white hover:text-gray-200 mr-4">Profile</a>
                    <a href="{{ route('leaderboard') }}" class="text-white hover:text-gray-200 mr-4">Leaderboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-200">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-gray-200">Login</a>
                @endif
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8 flex-grow">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Leaderboard</h1>
        <p class="mb-6 text-gray-600">Here are our top quiz masters. Can you make it to the top?</p>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rank
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Username</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">XP
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                            Correct Answers</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($leaderboard as $index => $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($index + 1 <= 3)
                                    <span class="text-2xl">
                                        @if ($index + 1 == 1)
                                            🥇
                                        @elseif ($index + 1 == 2)
                                            🥈
                                        @else
                                            🥉
                                        @endif
                                    </span>
                                @else
                                    <span class="text-gray-900">{{ $index + 1 }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{-- <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="/placeholder.svg?height=40&width=40"
                                            alt="">
                                    </div> --}}
                                    {{-- <div class="ml-4"> --}}
                                        <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                        {{--
                                    </div> --}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->xp }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->total_correct_answers }}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap justify-between items-center">
                <div class="w-full md:w-1/3 text-center md:text-left">
                    <img src="/placeholder.svg?height=40&width=40" alt="QuizMaster Logo"
                        class="h-10 w-10 mx-auto md:mx-0 mb-4">
                    <p>&copy; 2023 QuizMaster. All rights reserved.</p>
                </div>
                <div class="w-full md:w-1/3 text-center my-4 md:my-0">
                    <h3 class="text-lg font-semibold mb-2">Quick Links</h3>
                    <ul>
                        <li><a href="#" class="hover:text-gray-300">About Us</a></li>
                        <li><a href="#" class="hover:text-gray-300">Contact</a></li>
                        <li><a href="#" class="hover:text-gray-300">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/3 text-center md:text-right">
                    <h3 class="text-lg font-semibold mb-2">Follow Us</h3>
                    <div class="flex justify-center md:justify-end space-x-4">
                        <a href="#" class="hover:text-gray-300"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="hover:text-gray-300"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-gray-300"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>