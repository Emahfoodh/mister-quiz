<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMaster - Quiz Results</title>
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
                <a href="{{ route('home') }}" class="text-white hover:text-gray-200 mr-4">Home</a>
                <a href="{{ route('profile') }}" class="text-white hover:text-gray-200 mr-4">Profile</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:text-gray-200">Logout</button>
                </form>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8 flex-grow">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Quiz Results</h1>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <div class="text-center">
                <p class="text-2xl font-semibold mb-4">You answered <span
                        class="text-green-600">{{ $correctAnswers }}</span> out of <span
                        class="text-blue-600">{{ count($quizData) }}</span> questions correctly.</p>
                <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                    <div class="bg-green-600 h-2.5 rounded-full"
                        style="width: {{ count($quizData) > 0 ? ($correctAnswers / count($quizData)) * 100 : 0 }}%">
                    </div>
                </div>
                <p class="text-xl">Your score: {{ round(($correctAnswers / count($quizData)) * 100) }}%</p>
            </div>
        </div>

        <h2 class="text-2xl font-bold mb-4 text-gray-800">Category Breakdown</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($categoryCorrect as $category => $count)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold mb-2">{{ ucfirst($category) }}</h3>
                    <div class="flex items-center">
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mr-2">
                            <div class="bg-blue-600 h-2.5 rounded-full"
                                style="width: {{ ($count / $categoryTotal[$category]) * 100 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-700">{{ $count }}/{{ $categoryTotal[$category] }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('leaderboard') }}"
                class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 inline-block transform hover:scale-105">
                View Leaderboard
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-8">
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