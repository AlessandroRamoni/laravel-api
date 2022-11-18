<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:30'
        ],
        [
            'required' => 'Il campo è obbligatorio',
            'max' => 'Massimo :max caratteri'
        ]
    );

        $form_data = $request->all();
        $category = new Category();
        $category->fill($form_data);
        $slug = $this->getSlug($category->name);
        $category->slug = $slug;
        $category->save();

        return redirect()->route('admin.categories.show', $category->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        //dd($id)
        $category = Category::where('slug', $id)->first();

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        // dd($category);

        $request->validate([
            'name' => 'required|max:255'
        ]);

        $form_data = $request->all();
        if($category->name != $form_data['name']){
            $slug = $this->getSlug($form_data['name']);
            $form_data['slug'] = $slug;
        }
        $category->update($form_data);

        return redirect()->route('admin.categories.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('admin.categories.index');
    }

    private function getSlug($name){
        $slug = Str::slug($name);
        $slug_base = $slug;
        $existingPost = Category::where('slug', $slug)->first();
        $counter = 1;
        while ($existingPost) {
            $slug = $slug_base . '_' . $counter;
            $counter++;
            $existingPost = Category::where('slug', $slug)->first();
        }
            return $slug;
        }
}
