<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Language;
use Illuminate\Http\Request;
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
        return view('admin.answers.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::orderBy('name')->get();
        $actions = [
            'basic' => 'Basic answer',
            'redirect' => 'Redirect to page',
            'derive' => 'Derive to an operator'
        ];
        return view('admin.answers.create', compact('languages', 'actions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'language_id' => 'required|exists:languages,id',
            'question' => 'required|max:100',
            'answer' => 'required',
            'action' => 'required|in:basic,redirect,derive',
        ]);

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
        $actions = [
            'basic' => 'Basic answer',
            'redirect' => 'Redirect to page',
            'derive' => 'Derive to an operator'
        ];

        return view('admin.answers.edit', compact('languages', 'actions', 'answer'));
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
        $request->validate([
            'language_id' => 'required|exists:languages,id',
            'question' => 'required|max:100',
            'answer' => 'required',
            'action' => 'required|in:basic,redirect,derive',
        ]);

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
