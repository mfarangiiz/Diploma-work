<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Models\Abakus;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function showForm()
    {
        return view('test');
    }

    public function generate(Request $request)
    {
        $count = (int)$request->input('count');
        $difficulty = $request->input('difficulty');
        $timer = (int)$request->input('timer');

        $operators = ['+', '-'];
        $range = [1, 10];

        if ($difficulty === 'medium') {
            $operators = ['+', '-', '*', '/'];
            $range = [1, 20];
        } elseif ($difficulty === 'hard') {
            $operators = ['+', '-', '*', '/'];
            $range = [10, 1000];
        }

        $numbers = [];
        $expression = '';

        for ($i = 0; $i < $count; $i++) {
            $num = rand($range[0], $range[1]);
            $numbers[] = $num;
            $expression .= $num;
            if ($i < $count - 1) {
                $op = $operators[array_rand($operators)];
                $expression .= " $op ";
            }
        }

        // Evaluate safely
        $result = eval("return " . $expression . ";");

        session([
            'expression' => $expression,
            'correct_answer' => round($result, 2),
            'timer' => $timer
        ]);

        return view('test', [
            'expression' => $expression,
            'timer' => $timer,
        ]);
    }

    public function submit(Request $request)
    {
        $userAnswer = $request->input('answer');
        $correctAnswer = session('correct_answer');
        $isCorrect = round($userAnswer, 2) == round($correctAnswer, 2);

        $result = $isCorrect ? 'Correct!' : 'Incorrect!';

        return view('test', [
            'expression' => session('expression'),
            'correct_answer' => $correctAnswer,
            'user_answer' => $userAnswer,
            'result' => $result,
        ]);
    }


    public function index()
    {
        return view('admin.test.index', [
            'tests' => Test::all(),
            'abakus' => Abakus::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestRequest $request)
    {
        Test::create($request->all());
        return redirect()->back()->with('success', 'Test yaratildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        return view('admin.test.edit', ['test' => $test]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        $test->update($request->all());
        return view('test.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        $test->delete();
        return redirect()->back();
    }

    public function startTest($name, $id)
    {
//        // Get all tests related to the lesson
//        $tests = Test::where('status', $id)->where('age', auth()->user()->age)->get()->map(function ($test) use ($id) {
//            // Get 2 random incorrect answers from the same lesson, excluding this test's correct answer
//            $incorrectAnswers = Test::where('status', $id)
//                ->where('id', '!=', $test->id)
//                ->where('answer', '!=', $test->answer)
//                ->inRandomOrder()
//                ->limit(2)
//                ->pluck('answer')
//                ->toArray();
//
//            // Include the correct answer and shuffle
//            $options = array_merge($incorrectAnswers, [$test->answer]);
//            shuffle($options);
//
//            $test->options = $options;
//            return $test;
//        });
//
//        return view('test', compact('tests'));

        return view('test');

    }

    public function submitTest(Request $request)
    {
        $answers = $request->input('answers', []);
        $correctCount = 0;
        $totalQuestions = count($answers);

        foreach ($answers as $questionId => $selectedAnswer) {
            $correctAnswer = Test::find($questionId)->answer;
            if ($selectedAnswer == $correctAnswer) {
                $correctCount++;
            }
        }

        // Avoid division by zero
        $percentage = $totalQuestions > 0 ? round(($correctCount / $totalQuestions) * 100, 2) : 0;
        if ($percentage >= 75) {
            auth()->user()->update([
                'test_status' => $correctCount,
                // Optionally save the percentage too:
                // 'test_percentage' => $percentage,
            ]);
        }
        return redirect()->back()->with([
            'correctCount' => $correctCount,
            'submittedAnswers' => $answers
        ]);

    }

}
