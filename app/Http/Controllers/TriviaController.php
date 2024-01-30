<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Quiz;

class TriviaController extends Controller
{
    public function show()
    {
        return view('trivia');
    }

    public function fetchTrivia()
    {
        $apiUrl = 'https://opentdb.com/api.php?amount=1&type=boolean';

        // Make a GET request to the trivia API
        $response = Http::get($apiUrl);

        do {
            $data = $response->json();

            // Extract questions from the results
            $results = $data['results'] ?? null;

            // Check if results exist and is an array
            if (!empty($results) && is_array($results)) {
                // Apply htmlspecialchars to specific string values
                foreach ($results as &$result) {
                    $result['question'] = str_replace("&quot;", "", htmlspecialchars($result['question']));
                    $result['correct_answer'] = htmlspecialchars($result['correct_answer']);
                    foreach ($result['incorrect_answers'] as &$incorrectAnswer) {
                        $incorrectAnswer = htmlspecialchars($incorrectAnswer);
                    }
                }

                // Set $questions to the sanitized results
                $questions = $results;
            }
        } while (empty($questions));
        return view('trivia', compact('questions'));
    }

    public function fetchQuizdb()
    {
        $username = session('name');
        $questions = Quiz::all();
        // Pass the questions to the view
        return view('trivia', ['questions' => $questions])->with('username', $username);;
    }

    public function store()
    {
        $question = ('test_question');
        $answer = (1);

        DB::table('quiz')->insert([
            'question' => $question,
            'answers' => $answer,
        ]);

        return redirect()->route('trivia.fetch')->with('success', 'Quiz question added successfully');
    }

    public function add()
    {
        return view('add');
    }

    public function added(Request $request)
    {
        // print_r($request);
        $question  = $request->input('question');
        $answer = $request->input('answer') === 'True' ? 1 : 0; // Convert to boolean

        //------------------------------------------------------------------------------------------------------------
        // If you are comfortable with mass assignment and want a concise an expressive way to create an save a record, 
        // the 'create' method is a good choice
        //------------------------------------------------------------------------------------------------------------

        // Quiz::create('quiz')->insert([
        //     'question'=>$question,
        //     'answers'=>$answer,
        // ]);

        //------------------------------------------------------------------------------------------------------------
        //If you needd more control over the process, or if you wnat to perform additional actions before or after saving,
        // using 'new' and 'save' allows you to have finer control.
        //------------------------------------------------------------------------------------------------------------
        $record = new Quiz;
        $record->question = $question;
        $record->answers = $answer;
        $record->save();

        return redirect()->route('trivia.fetch')->with('success', 'Quiz question added successfully');
    }
}
