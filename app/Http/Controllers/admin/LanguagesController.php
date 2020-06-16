<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguagesController extends Controller
{
    public function index()
    {
    	$languages = Language::all();
    	return view('admin.languages.list-languages', compact('languages'));
    }

    public function create()
    {
    	return view('admin.languages.create-language');
    }

    public function store(LanguageRequest $request)
    {
    	Language::create([
    		'abbr' => $request->abbr,
    		'locale' => $request->locale,
    		'name' => $request->name,
    		'direction' => $request->direction,
    	]);
    	return back();
    }

    public function edit(Language $language)
    {
    	return view('admin.languages.edit-language', compact('language'));
    }

    public function update(LanguageRequest $request, Language $language)
    {
    	$language->update([
    		'abbr' => $request->abbr,
    		'locale' => $request->locale,
    		'name' => $request->name,
    		'direction' => $request->direction,
    	]);

    	return redirect()->route('admin.languages.list');
    }
}
