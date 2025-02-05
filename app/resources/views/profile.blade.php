<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMaster - User Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center">
                {{-- <img src="/placeholder.svg?height=40&width=40" alt="QuizMaster Logo" class="h-10 w-10 mr-3"> --}}
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
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-6 text-gray-800">User Profile</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <img src="/placeholder.png?height=200&width=200" alt="{{ $user->name }}" class="w-48 h-48 rounded-full mx-auto md:mx-0">
                    </div>
                    <div>
                        <p class="mb-2"><span class="font-semibold">Username:</span> {{ $user->name }}</p>
                        <p class="mb-2"><span class="font-semibold">Email:</span> {{ $user->email }}</p>
                        <p class="mb-2"><span class="font-semibold">XP:</span> {{ $user->xp }}</p>
                        <p class="mb-2"><span class="font-semibold">Rank:</span> {{ $rank }}</p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gray-50">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Category Stats</h2>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correct Answers</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Questions</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correct %</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($stats as $category => $data)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($category) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $data['correct'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $data['total'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-16 bg-gray-200 rounded-full h-2.5 mr-2">
                                                <div class="bg-green-600 h-2.5 rounded-full" style="width: {{ $data['percentage'] }}%"></div>
                                            </div>
                                            <span>{{ $data['percentage'] }}%</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-8">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap justify-between items-center">
                <div class="w-full md:w-1/3 text-center md:text-left">
                    <img src="/placeholder.svg?height=40&width=40" alt="QuizMaster Logo" class="h-10 w-10 mx-auto md:mx-0 mb-4">
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