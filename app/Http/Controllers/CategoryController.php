<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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
        $data = Category::latest()->paginate(50);

        return view('category.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $slug = $request->slug;
        $image = $request->file('image');

        $imageName = time().'.'.$image->extension();
        $image->move(public_path('assets/img/category'), $imageName);

        $category = new Category();
        $category->name = $name;
        $category->slug = $slug;
        $category->image = $imageName;
        $category->save();

        return back()->with('success','Category created successfully.');
        /*$validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['slug'], '-');
        Category::create($request->all());

        return redirect()->route('category.create')
                        ->with('success','Category created successfully.');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
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
        $name = $request->name;
        $slug = $request->slug;
        $image = $request->file('image');

        $imageName = time().'.'.$image->extension();
        $image->move(public_path('assets/img/category'), $imageName);

        $category = Category::find($category->id);
        $category->name = $name;
        $category->slug = $slug;
        $category->image = $imageName;
        $category->save();

        return redirect()->route('category.index')
                        ->with('success','Category updated successfully.');
       /* $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['slug'], '-');
        $category->update($request->all());

        return redirect()->route('category.create')
                        ->with('success','Category updated successfully');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');
    }
}
