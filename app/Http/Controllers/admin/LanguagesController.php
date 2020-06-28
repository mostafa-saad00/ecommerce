<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    } 
    
    public function index()
    {
    	$languages = Language::paginate(PAGINATION_COUNT);
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
            'active' => $request->active,
    	]);
        return back()->with('success', 'Language created successfully.');
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
            'active' => $request->active,
    	]);

    	return back()->with('success', 'Language updated successfully.');
    }

    public function destroy(Language $language)
    {
    	$language->delete();

    	return back();
    }
}
