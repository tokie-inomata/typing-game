<?php

namespace App\Http\Controllers\ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function question(Request $request)
    {
        $questions = Question::all();

        return $questions;
    }

    public function pictureBook(Request $request)
    {
        session()->put('getInsect', $request->getsId);
        return;
    }
}
