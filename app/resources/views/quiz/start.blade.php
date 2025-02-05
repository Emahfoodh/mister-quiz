<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMaster - Take the Quiz</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Add CSRF Token Meta Tag -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Quiz Time!</h1>

        <form id="quizForm" method="POST" action="{{ route('quiz.result') }}" class="space-y-8">
            @csrf
            @foreach ($questions as $index => $question)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-xl font-semibold text-gray-800">Question {{ $index + 1 }}</p>
                        <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                            {{ $question['category'] }}
                        </span>
                    </div>
                    <p class="mb-4 text-gray-700"><strong>{{ $question['question'] }}</strong></p>
                    <div class="space-y-2">
                        @foreach (\App\Models\Answer::where('question_id', $question['id'])->get() as $answer)
                            <label
                                class="flex items-center space-x-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 transition duration-150 ease-in-out cursor-pointer">
                                <input type="radio" name="answers[{{ $question['id'] }}]" value="{{ $answer->id }}" required
                                    class="form-radio h-5 w-5 text-purple-600">
                                <span class="text-gray-700">{{ $answer->answer }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <div class="flex justify-center mt-8">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 transform hover:scale-105"
                    id="submitBtn">
                    Submit Quiz
                </button>
            </div>
        </form>
    </main>

    <!-- Result Modal -->
    <div id="resultModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4">Quiz Results</h2>
                <div id="modalContent"></div>
                <div class="mt-6 text-center">
                    <button onclick="redirectToLeaderboard()"
                        class="bg-purple-500 hover:bg-purple-600 text-white px-6 py-2 rounded-lg">
                        View Leaderboard
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Improved JavaScript -->
    <script>
        function redirectToLeaderboard() {
            window.location.href = '{{ route("leaderboard") }}';
        }

        document.getElementById('quizForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Processing...';

            try {
                const formData = new FormData(e.target);
                const response = await fetch(e.target.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.error || 'Something went wrong');
                }

                // Build modal content
                const content = `
                    <div class="mb-6">
                        <p class="text-xl mb-4">
                            You answered <span class="text-green-600 font-bold">${data.correctAnswers}</span> 
                            out of <span class="text-blue-600 font-bold">${data.totalQuestions}</span> correctly!
                        </p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                            <div class="bg-green-600 h-2.5 rounded-full" 
                                style="width: ${data.percentage}%"></div>
                        </div>
                        <p class="text-lg">Score: ${data.percentage}%</p>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Category Breakdown</h3>
                    <div class="grid gap-4 mb-6">
                        ${Object.entries(data.categoryCorrect).map(([category, count]) => `
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold mb-2">${category}</h4>
                                <div class="flex items-center">
                                    <div class="w-full bg-gray-200 rounded-full h-2 mr-2">
                                        <div class="bg-blue-600 h-2 rounded-full" 
                                            style="width: ${(count / data.categoryTotal[category]) * 100}%"></div>
                                    </div>
                                    <span class="text-sm">${count}/${data.categoryTotal[category]}</span>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                `;

                document.getElementById('modalContent').innerHTML = content;
                document.getElementById('resultModal').classList.remove('hidden');
            } catch (error) {
                alert(error.message);
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Submit Quiz';
            }
        });
    </script>

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