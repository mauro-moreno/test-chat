<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageFormRequest;
use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::orderBy('name')->get();
        return view('admin.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\LanguageFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageFormRequest $request)
    {
        $language = new Language([
            'id' => $request->get('id'),
            'name' => $request->get('name'),
        ]);

        $language->save();

        return redirect('/admin/languages')->with('success', 'Language saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('admin.languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\LanguageFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageFormRequest $request, $id)
    {
        $language = Language::findOrFail($id);
        $language->id = $request->get('id');
        $language->name = $request->get('name');
        $language->save();

        return redirect('/admin/languages')->with('success', 'Language updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect('/admin/languages')->with('success', 'Language deleted!');
    }
}
