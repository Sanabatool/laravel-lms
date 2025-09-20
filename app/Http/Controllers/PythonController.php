<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use DB;

class PythonController extends Controller
{
    public function handleQuery(Request $request)
    {
        $query = $request->input('question');

        // Fetch course data
        $courses = Course::table('courses')->get();

        // Send query to Python backend
        $response = $this->sendToPython($query, $courses);
        return response()->json(['response' => $response]);
    }

    private function sendToPython($query, $courses)
    {
        // Make HTTP request to Python server
        $client = new \GuzzleHttp\Client();
        $response = $client->post('http://127.0.0.1:5000/chatbot', [
            'json' => [
                'question' => $query,
                'courses' => $courses,
            ],
        ]);

        return json_decode($response->getBody(), true)['response'];
    }
}
