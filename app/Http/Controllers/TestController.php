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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        //
    }

    public function startTest($name,$id)
    {
        // Get all tests related to the lesson
        $tests = Test::where('status', $id)->get()->map(function ($test) use ($id) {
            // Get 2 random incorrect answers from the same lesson, excluding this test's correct answer
            $incorrectAnswers = Test::where('status', $id)
                ->where('id', '!=', $test->id)
                ->where('answer', '!=', $test->answer)
                ->inRandomOrder()
                ->limit(2)
                ->pluck('answer')
                ->toArray();

            // Include the correct answer and shuffle
            $options = array_merge($incorrectAnswers, [$test->answer]);
            shuffle($options);

            $test->options = $options;
            return $test;
        });

        return view('test', compact('tests'));
    }

    public function submitTest(Request $request)
    {
        $answers = $request->input('answers', []);
        $correctCount = 0;

        foreach ($answers as $questionId => $selectedAnswer) {
            $correctAnswer = Test::find($questionId)->answer;
            if ($selectedAnswer == $correctAnswer) {
                $correctCount++;
            }
        }

        return redirect()->back()->with([
            'correctCount' => $correctCount,
            'submittedAnswers' => $answers
        ]);
    }

}
