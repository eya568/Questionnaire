<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
class SurveyController extends Controller
{
    //
    
    public function show(Questionnaire $questionnaire,$slug)
    {

        return view('survey.show',compact('questionnaire'));

    }
    public function store(Questionnaire $questionnaire)
    {
        try {
            $data = request()->validate([
                'responses.*.answer_id' => 'required',
                'responses.*.question_id' => 'required',
                'survey.email' => 'required|email',
                'survey.name' => 'required',
            ], [
                'responses.*.answer_id.required' => 'Please select an answer for all questions.',
                'responses.*.question_id.required' => 'An error occurred. Please try again.',
                'survey.email.required' => 'Email is required.',
                'survey.email.email' => 'Please enter a valid email address.',
                'survey.name.required' => 'Name is required.',
            ]);
    
            $survey = $questionnaire->surveys()->create($data['survey']);
            $survey->responses()->createMany($data['responses']);
    
            return "Thank you for completing the survey!";
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
    
    
}
