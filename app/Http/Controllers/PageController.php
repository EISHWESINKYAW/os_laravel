<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Item;

class PageController extends Controller
{
     
    public function mainfun($value='')
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $items=Item::all();
    	return view('frontend.main',compact('categories','subcategories','items'));
    }
    public function brandfun($value='')
    {
    	return view('frontend.brand');
    }
    public function loginfun($value='')
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $items=Item::all();
    	return view('frontend.login',compact('categories','subcategories','items'));
    }
    public function detailfun($value='')
    {
    	return view('frontend.detail');
    }
    public function promotionfun($value='')
    {
    	return view('frontend.promotion');
    }
    public function registerfun($value='')
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $items=Item::all();
    	return view('frontend.register',compact('categories','subcategories','items'));
    }
    public function cartfun($value='')
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $items=Item::all();
    	return view('frontend.cart',compact('categories','subcategories','items'));
    }
    public function categoryfun($value='')
    {
    	return view('frontend.category');
    }
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
}
