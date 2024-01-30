<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TriviaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testfetchTrivia(){
        $apiUrl='https://opentdb.com/api.php?amount=10';

          // Make a GET request to the trivia API
          $response = Http::get($apiUrl);

          // Assert that the response has a successful status code (HTTP 200 OK)
          $this->assertEquals(200, $response->status());
  
          // Assert the JSON structure of the response
          $response->assertJsonStructure([
              'response_code',
              'results' => [
                  '*' => [
                      'category',
                      'type',
                      'difficulty',
                      'question',
                      'correct_answer',
                      'incorrect_answers',
                  ],
              ],
          ]);
  
          // Optionally, you can assert specific conditions on the data
          $responseData = $response->json();
          $this->assertNotEmpty($responseData['results']);
    }
}
