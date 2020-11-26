<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Subcategory;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('item.create',compact('brands', 'categories', 'subcategories'));
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
            "photo" => "required|mimes:jpeg,jpg,png",
            "price" => "required",
            "discount" => "sometimes|required",
            "description" => "required",
        ]);
        // dd($request->subcategory);
        if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }

        // store
        $item = new Item;
        $item->codeno = uniqid();
        $item->name = $request->name;
        $item->photo = $path;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand;
        $item->subcategory_id = $request->subcategory;
        $item->Save();

        // redirect
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('item.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('item.edit',compact('item', 'brands', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // dd($request);
       $request->validate([
            "name" => "required|min:5",
            "photo" => "sometimes|required|mimes:jpeg,jpg,png",
            "price" => "required",
            "discount" => "sometimes|required",
            "description" => "required",
            "brand" => "required",
            "subcategory" => "required"
        ]);

        if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }else{
            $path = $request->oldphoto;
        }

        // store
        $item->name = $request->name;
        $item->photo = $path;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand;
        $item->subcategory_id = $request->subcategory;
        $item->Save();

        // redirect
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item = Item::find($item);
        $item->Delete();
        return redirect()->route('item.index');
    }
    // public function filterCategory(Request $request)
    // {
    //     $cid = $request->cid;
    //     $subcategories = Subcategory::where('category_id', $cid)->get();
    //     return $subcategories;
    // }
}
