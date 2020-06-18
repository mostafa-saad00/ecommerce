<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
    	$categories = Category::paginate(PAGINATION_COUNT);
    	return view('admin.categories.list-categories', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
    	$saved_photo = Category::save_image($request);
    	Category::create([
    		'translation_lang' => 'en',
    		'translation_of' => 0,
    		'name' => $request->name,
    		'slug' => $request->slug,
    		'photo' => $saved_photo,
    	]);
    	return back();
    }

    // public function edit(Language $language)
    // {
    // 	return view('admin.languages.edit-language', compact('language'));
    // }

    // public function update(LanguageRequest $request, Language $language)
    // {
    // 	$language->update([
    // 		'abbr' => $request->abbr,
    // 		'locale' => $request->locale,
    // 		'name' => $request->name,
    // 		'direction' => $request->direction,
    // 	]);

    // 	return redirect()->route('admin.languages.list');
    // }

    public function destroy(Category $category)
    {
    	$category->delete();

    	return back();
    }
}
