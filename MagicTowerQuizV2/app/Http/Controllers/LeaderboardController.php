<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Leaderboard;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        $orderType = $request->input('orderType');
        $order = $request->input('order');
        $q = DB::table('leaderboards');
        $numberOfEntries = $q->count();
        if ($numberOfEntries > 0) {
            $maxOfNumberOfQuestions = $q->max('number_of_questions');
            $maxNumberOfQuestions = $request->input('max-noq');
            $minNumberOfQuestions = $request->input('min-noq');
            if (!isset($maxNumberOfQuestions) || $maxNumberOfQuestions > $maxOfNumberOfQuestions){
                $maxNumberOfQuestions = $maxOfNumberOfQuestions;
            }
            if (!isset($minNumberOfQuestions) || $minNumberOfQuestions < 1) {
                $minNumberOfQuestions = 1;
            }
            if ($order != 'desc' && $order != 'asc') {
                $order = 'desc';
            }

            if ($orderType != 'time' && $orderType != 'name' && $orderType != 'percentage' && $orderType != 'points' && $orderType != 'number_of_questions' && $orderType != 'points_per_minute') {
                $orderType = 'percentage';
            }

            $q = $q->where('name', 'like', '%'.$name.'%')
                ->where('number_of_questions', '>=', $minNumberOfQuestions)
                ->where('number_of_questions', '<=', $maxNumberOfQuestions)
                ->orderBy($orderType, $order)
                ->orderBy('points', 'desc')
                ->orderBy('time', 'asc');
            $lboard = $q->get();
        }
        else {
            $lboard = [];
            $maxOfNumberOfQuestions = 1;
            $minNumberOfQuestions = 1;
            $maxNumberOfQuestions = 1;
        }
        return view('leaderboard.index', compact('name', 'order', 'orderType', 'lboard', 'minNumberOfQuestions', 'maxNumberOfQuestions', 'maxOfNumberOfQuestions' , 'numberOfEntries'));
    }
    public function store(Request $request)
    {
        if (!isset($request->name) || !isset($request->points) || !isset($request->time) || !isset($request->number_of_questions)) {
            return redirect('/leaderboards');
        }
        $name = $request->name;
        $points = $request->points;
        $time = $request->time;
        $number_of_questions = $request->number_of_questions;
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
        return redirect('/leaderboards');
    }
}
