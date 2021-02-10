<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subcategory::latest()->paginate(10);

        return view('subcategory.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('subcategory.create',compact('categories'));
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
        $featured = $request->file('featured');
        $category_id = $request->category_id;

        $imageName = time().'.'.$image->extension();
        $fimageName = time().'.'.$featured->extension();
        $image->move(public_path('assets/img/subcategory'), $imageName);
        $featured->move(public_path('assets/img/subcategory'), $fimageName);

        $subcategory = new Subcategory();
        $subcategory->name = $name;
        $subcategory->slug = $slug;
        $subcategory->image = $imageName;
        $subcategory->featured = $fimageName;
        $subcategory->category_id = $category_id;
        $subcategory->save();

        return back()->with('success','Subcategory created successfully.');

       /* $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Only allow .jpg, .bmp and .png file types.
            'featured' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Only allow .jpg, .bmp and .png file types.
            'category_id' => 'required',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['slug'], '-');

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('assets\img'), $imageName);
        Subcategory::create($request->all());

        return redirect()->route('subcategory.create')
                        ->with('success','Subcategory created successfully.')
                        ->with('image',$imageName);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        return view('subcategory.show',compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('subcategory.edit', compact('subcategory'))->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $name = $request->name;
        $slug = $request->slug;
        $image = $request->file('image');
        $featured = $request->file('featured');
        $category_id = $request->category_id;

        $imageName = time().'.'.$image->extension();
        $fimageName = time().'.'.$featured->extension();
        $image->move(public_path('assets/img/subcategory'), $imageName);
        $featured->move(public_path('assets/img/subcategory'), $fimageName);

        $subcategory = Subcategory::find($subcategory->id);
        $subcategory->name = $name;
        $subcategory->slug = $slug;
        $subcategory->image = $imageName;
        $subcategory->featured = $fimageName;
        $subcategory->category_id = $category_id;
       // $subcategory->category_id()->sync($request->category_id);
        $subcategory->save();

        return redirect()->route('subcategory.index')
                        ->with('success','Subcategory updated successfully');
       /* $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Only allow .jpg, .bmp and .png file types.
            'featured' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Only allow .jpg, .bmp and .png file types.
            'category_id' => 'required',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['slug'], '-');
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('assets\img'), $imageName);

        $subcategory->update($request->all());

        return redirect()->route('subcategory.create')
                        ->with('success','Subcategory updated successfully')
                        ->with('image',$imageName);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('subcategory.index')
                        ->with('success','Subcategory deleted successfully');
    }
}
