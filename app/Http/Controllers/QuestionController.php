<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $questions = [
            [
                'id' => '1',
                'jp_question' => 'テストようもんだい',
                'ro_question' => 'tesutoyou monndai',
            ],
            [
                'id' => '2',
                'jp_question' => 'テストようもんだい2',
                'ro_question' => 'tesutoyou monndai2',
            ],
            [
                'id' => '3',
                'jp_question' => 'テストようもんだい3',
                'ro_question' => 'tesutoyou monndai3',
            ],
        ];
        return view('typing.question-index', ['questions' => $questions]);
    }
}
