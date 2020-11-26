<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
Use App\Subcategory;
Use App\Brand;

class FrontendController extends Controller
{
    public function home($value='')
    {
    	$items = Item::all();
        $brands = Brand::all();
    	return view('frontend.mainpage', compact('items', 'brands'));
    }

    public function itemdetail($id)
    {
    	$item = Item::find($id);
    	return view('frontend.itemdetail', compact('item'));
    }

    public function signin($value='')
    {
        return view('frontend.signin');
    }

    public function signup($value='')
    {
        return view('frontend.signup');
    }

    public function itemsbysubcategory($id)
    {
        $mysubcategory = Subcategory::find($id);
        return view('frontend.itemsbysubcategory', compact('mysubcategory'));
    }

    public function cart($value='')
    {
        return view('frontend.cartpage');
    }
}
