<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMaster - Test Your Knowledge</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Hero Section -->
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
        <div class="container mx-auto px-6 py-16 text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to QuizMaster</h1>
            <p class="text-xl mb-8">Challenge yourself and compete with others in exciting quizzes!</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Quiz Section -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Start a Quiz</h2>
                <p class="mb-6 text-gray-600">Test your knowledge across various categories and difficulty levels.</p>
                <a href="{{ route('quiz.start') }}"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 inline-flex items-center">
                    <i class="fas fa-play mr-2"></i> Start Quiz
                </a>
            </div>
            <!-- Leaderboard Section -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Leaderboard</h2>
                <p class="mb-6 text-gray-600">See how you rank against other quiz enthusiasts.</p>
                <a href="{{ route('leaderboard') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 inline-flex items-center">
                    <i class="fas fa-trophy mr-2"></i> View Leaderboard
                </a>
            </div>
        </div>
    </main>

    <!-- Features Section -->
    <section class="bg-gray-200 py-12">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-8">Why Choose QuizMaster?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <i class="fas fa-brain text-4xl text-purple-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Challenging Questions</h3>
                    <p class="text-gray-600">Engage your mind with our carefully curated questions.</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-users text-4xl text-purple-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Compete with Others</h3>
                    <p class="text-gray-600">See how you stack up against quiz takers worldwide.</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-chart-line text-4xl text-purple-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Track Your Progress</h3>
                    <p class="text-gray-600">Monitor your improvement and set new personal bests.</p>
                </div>
            </div>
        </div>
    </section>

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