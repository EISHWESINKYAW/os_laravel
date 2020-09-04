<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Item;
use App\Brand;

class PageController extends Controller
{
     
    public function mainfun($value='')
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $items=Item::all();
        $brands=Brand::all();
    	return view('frontend.main',compact('categories','subcategories','items','brands'));
    }
    public function brandfun($id)
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $items=Item::all();
        $brand=Brand::find($id);
    	return view('frontend.brand',compact('categories','subcategories','items','brand'));
    }
    public function loginfun($value='')
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $items=Item::all();
    	return view('frontend.login',compact('categories','subcategories','items'));
    }
    public function detailfun($id)
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $item=Item::find($id);
    	return view('frontend.detail',compact('categories','subcategories','item'));
    }
    public function promotionfun($value='')
    {
         $categories=Category::all();
        $subcategories=Subcategory::all();
        $items=Item::all();
    	return view('frontend.promotion',compact('categories','subcategories','items'));
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
    public function categoryfun($id)
    {
        $categories=Category::all();
        $subcategory=Subcategory::find($id);
        $items=Item::all();
        $subcategories=Subcategory::all();
    	return view('frontend.category',compact('categories','subcategory','items','subcategories'));
    }
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
}
