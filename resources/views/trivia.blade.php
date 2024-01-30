@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="center-container">
        <!-- Points button div with absolute positioning -->
        <div class="point">
            <h3 id="points" class="">0</h3>
        </div>

        <!-- Content div -->
        <div class="center-content mt-5">
            <h3 id="question"></h3>
            <div class="answers">
                <div class="answers">
                    <div class="p-2 true">
                        <button type="button" value="true" class="btn btn-success btn-lg" id="answer-true">True</button>
                    </div>
                    <div class="p-2 false">
                        <button type="button" value="false" class="btn btn-danger btn-lg" id="answer-false">False</button>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <button id="next-question" class="btn btn-primary">Next Question</button>
            </div>
        </div>

        <!-- Add button div -->
        <div class="add-button">
            <button type="button" class="btn btn-primary btn-lg"
                onclick="window.location.href='{{ route('trivia.add') }}'">
                Add A Question Here!
            </button>
        </div>
    </div>
    <script>
        var questions = @json($questions);
        var questionIndex = 0;
        var Counter = 0;
        var content = document.getElementById('content');

        function displayQuestion() {
            document.getElementById('question').innerText = questions[questionIndex].question;
        }


        function nextQuestion() {
            questionIndex++;
            if (questionIndex < questions.length) {
                displayQuestion();
            } else {
                // Optionally, you can handle the end of questions here
                alert('End of questions');
                questionIndex = 0;
                displayQuestion();
            }
        }

        document.getElementById('next-question').addEventListener('click', nextQuestion);

        // Initial display
        displayQuestion();

        function point() {
            var correct = questions[questionIndex].answers;

            if (answer == correct) {
                Counter++;
                document.getElementById('points').innerText = Counter;
                nextQuestion();
                points.classList.remove('glow-false'); // Remove the incorrect glow class
                points.classList.add('glow-correct');
            } else {
                points.classList.remove('glow-correct'); // Remove the correct glow class if it's present
                nextQuestion();
                points.classList.add('glow-false');
            }

        }

        // Attach click event listeners to each answer button
        document.getElementById('answer-true').addEventListener('click', function() {
            answer = true;
            point();
        });

        document.getElementById('answer-false').addEventListener('click', function() {
            answer = false;
            point();
        });
    </script>
@endsection
