<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoriesController extends Controller {
   
    public function index() {
        return view('back.categories.index')->with('categories', Category::all());
    }

    public function create() {
        return view('back.categories.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
           'name' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'Succesfully created a category');
        return redirect()->route('categories');
    }
 
    public function show($id) {
    }

    public function edit($id) {
        $category = Category::find($id);
        return view('back.categories.edit')->with('category', $category);
    }

    public function update(Request $request, $id) {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'Succesfully updated the category');
        return redirect()->route('categories');
    }

    public function destroy($id) {
        $category = Category::find($id);
        $category->delete();
        Session::flash('success', 'Succesfully deleted a category');
        return redirect()->route('categories');
    }
}
