<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $default_lang = getDefaultLanguage();
    	$categories = Category::where('translation_lang', $default_lang)->paginate(PAGINATION_COUNT);
    	return view('admin.categories.list-categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create-category');
    }


    public function store(CategoryRequest $request)
    {  
        $saved_photo = savePhoto($request, 'categories_images');
        $categories = collect($request->category);

        foreach ($categories as $cat)
        {
            $newCategory = Category::create([
                            'translation_lang' => $cat['abbr'],
                            'translation_of' => $cat['abbr'] == getDefaultLanguage() ? 0 : $default_category_id,
                            'name' => $cat['name'],
                            'slug' => $cat['slug'],
                            'photo_url' => $saved_photo,
                            'active' => $request->active,
            ]);
            $cat['abbr'] == getDefaultLanguage() ? $default_category_id = $newCategory->id : $default_category_id;
        }

        return back()->with('success', 'Category created successfully.');
    }



    public function edit(Category $defaultcategory)
    {
        foreach (getLanguagesWithOutTheDefault() as $lang)
        {
            $checkCategory = Category::where('id', '!=', $defaultcategory->id)->where('translation_of', $defaultcategory->id)->where('translation_lang', $lang->abbr)->first();

            if (!$checkCategory)
            {
                Category::create([
                    'translation_lang' => $lang->abbr,
                    'translation_of' => $defaultcategory->id,
                    'name' => '',
                    'slug' => '',
                    'photo_url' => $defaultcategory->photo_url,
                    'active' => 1,
                ]);
            }
        }

        $allLanguagesCategories = array();
        array_push($allLanguagesCategories, $defaultcategory);
        $categories = Category::where('translation_of', $defaultcategory->id)->get();
        foreach ($categories as $category) 
        {
            array_push($allLanguagesCategories, $category);   
        }

    	return view('admin.categories.edit-category', compact('allLanguagesCategories', 'defaultcategory'));
    }

    public function update(EditCategoryRequest $request, Category $defaultcategory)
    {
        
        $default_category_id = $defaultcategory->id;
        $categories = collect($request->category);

        $saved_photo = $defaultcategory->photo_url;
        if (isset($request->photo))
        {
            $saved_photo = savePhoto($request, 'categories_images');
        }
        

        $defaultcategory->update([
            'translation_lang' => $categories[0]['translation_lang'],
            'translation_of' => 0,
            'name' => $categories[0]['name'],
            'slug' => $categories[0]['slug'],
            'photo_url' => $saved_photo,
            'active' => $request->active,
        ]);


        $categories_without_default = $categories->filter(function($value, $key){

            return $value['translation_lang'] != getDefaultLanguage();
        });

        foreach ($categories_without_default as $cat)
        {

            Category::where('translation_of', $default_category_id)->where('translation_lang', $cat['translation_lang'])->update([
                'translation_lang' => $cat['translation_lang'],
                'translation_of' => $default_category_id,
                'name' => $cat['name'],
                'slug' => $cat['slug'],
                'photo_url' => $saved_photo,
                'active' => $request->active,

            ]);
            
        }



  
    	return redirect()->route('admin.categories.list')->with('success', 'Category modified successfully.');
    }

    public function destroy(Category $category)
    {
    	$category->delete();
        $relatedCategories = Category::where('translation_of', $category->id)->get();
        foreach ($relatedCategories as $cat)
        {
            $cat->delete();
        }

    	return back()->with('success', 'Category deleted successfully.');
    }
}
