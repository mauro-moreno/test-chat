<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Http\Requests\Admin\AnswerFormRequest;
use App\Language;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::all();
        $actions = Answer::ACTIONS;
        return view('admin.answers.index', compact('answers', 'actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::orderBy('name')->get();
        $actions = Answer::ACTIONS;
        return view('admin.answers.create', compact('languages', 'actions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\AnswerFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnswerFormRequest $request)
    {
        $answer = new Answer([
            'language_id' => $request->get('language_id'),
            'question' => $request->get('question'),
            'answer' => $request->get('answer'),
            'action' => $request->get('action'),
            'parameter' => $request->get('parameter'),
        ]);
        $answer->save();

        return redirect('/admin/answers')->with('success', 'Answer saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = Answer::findOrFail($id);

        $languages = Language::orderBy('name')->get();
        $actions = Answer::ACTIONS;

        return view('admin.answers.edit', compact('languages', 'actions', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\AnswerFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnswerFormRequest $request, $id)
    {
        $answer = Answer::findOrFail($id);
        $answer->language_id = $request->get('language_id');
        $answer->question = $request->get('question');
        $answer->answer = $request->get('answer');
        $answer->action = $request->get('action');
        $answer->parameter = $request->get('parameter');
        $answer->save();

        return redirect('/admin/answers')->with('success', 'Answer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = Answer::findOrFail($id);
        $answer->delete();

        return redirect('/admin/answers')->with('success', 'Answer deleted!');
    }
}
