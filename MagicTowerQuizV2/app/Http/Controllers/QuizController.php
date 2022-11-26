<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
use Illuminate\Support\Facades\DB;
use App\Models\Leaderboard;
use Session;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!isset($request->name)) {
            return redirect('/');
        }

        $request->validate([
            'name' => 'required|min:3|max:25'
        ]);
        $numberOfQuestionsFromDB = DB::table('questions')->count();
        $allowedMinimumQuestions = 1;
        if ($numberOfQuestionsFromDB >= 10) {
            $allowedMinimumQuestions = 5;
        }
        $name = $request->name;
        Session::put('playerName', $name);
        $numberOfQuestions = $request->number_of_questions;
        if ($numberOfQuestions < $allowedMinimumQuestions) { 
            $numberOfQuestions = $allowedMinimumQuestions;
        }
        $ids = DB::table('questions')->pluck('id');
        $chosenIds = $this->getRandomIds($ids, $numberOfQuestions);
        $questions = DB::table('questions')->whereIn('id', $chosenIds)->inRandomOrder()->get();
        Session::put('numberOfQuestions', $numberOfQuestions);
        Session::put('startTime', now());
        return view('quiz.index', compact('name', 'questions', 'numberOfQuestions'));
    }
    protected function getRandomIds($ids, &$number)
    {
        $countOfIds = count($ids);
        if ($number > $countOfIds) {
            $number = $countOfIds;
        }
        $indexes = [rand(0, $countOfIds - 1)];
        while (count($indexes) < $number) {
            $rnd = rand(0, $countOfIds - 1);
            if (!in_array($rnd, $indexes)) {
                array_push($indexes, $rnd);
            }
        }
        $resultIds = [];
        foreach ($indexes as $i) {
            array_push($resultIds, $ids[$i]);
        }
        return $resultIds;
    }

    public function evaluation(Request $request)
    {
        $endTime = now();
        $startTime = Session::get('startTime');
        $numberOfQuestions = Session::get('numberOfQuestions');
        $name = Session::get('playerName');
        if (!isset($startTime) || !isset($name) || !isset($numberOfQuestions)) {
            return redirect('/leaderboards');
        }
        Session::forget('startTime');
        Session::forget('numberOfQuestions');
        Session::forget('playerName');
        $ids = [];
        $time = strtotime($endTime) - strtotime($startTime);
        $points = 0;
        for ($i = 0; $i < $numberOfQuestions; $i++) {
            $id = $request->input('q' . $i);
            $answer = $request->input('a' . $i);
            array_push($ids, $id);
            $correctAnswer = DB::table('questions')->where('id', $id)->pluck('correct')[0];
            if (isset($answer) && $answer == $correctAnswer) {
                $points++;
            }
        }
        
        $this->saveToLeaderboards($name, $points, $time, $numberOfQuestions);
        return redirect('/leaderboards');
    }

    protected function saveToLeaderboards($name, $points, $time, $number_of_questions)
    {
        $percentage = $points / $number_of_questions * 100;
        $points_per_minute = $points / $time * 60;
        $entry = Leaderboard::create([
            'name' => $name,
            'percentage' => $percentage,
            'points' => $points,
            'time' => $time,
            'number_of_questions' => $number_of_questions,
            'points_per_minute' => $points_per_minute
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
