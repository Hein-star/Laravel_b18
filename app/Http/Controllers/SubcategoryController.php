<?php

namespace App\Http\Controllers;

use App\Subcategory;
use Illuminate\Http\Request;
use App\Category;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('subcategory.create', compact('categories'));
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
            "name" => "required|min:5",
        ]);
        // dd($request);
        // store
        $subcategory = new Subcategory;
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->Save();

        // redirect
        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        return view('subcategory.show',compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = category::all();
        return view('subcategory.edit',compact('categories', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            "name" => "required|min:5",
            "photo" => "sometimes|required|mimes:jpeg,jpg,png",
            "oldphoto" => "required"
        ]);
        if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('subcategoryimg', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }else{
            $path = $request->oldphoto;
        }

        // update
        $subcategory = Subcategory::find($subcategory);
        $subcategory->name = $request->name;
        $subcategory->photo = $path;
        $subcategory->category_id = $request->categories;
        $subcategory->save();

        // redirect
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory = Subcategory::find($subcategory);
        $subcategory->Delete();
        return redirect()->route('subcategory.index');
    }
}
