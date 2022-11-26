<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index() {
        $numberOfQuestions = DB::table('questions')->count();
        return view('pages.index', compact('numberOfQuestions'));
    }
}
