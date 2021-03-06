<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\Session;
use Sessions;

class TagsController extends Controller {
   
    public function index() {
        return view('back.tags.index')->with('tags', Tag::all());
    }

    public function create() {
        return view('back.tags.create');
    }
    
    public function store(Request $request) {
        $this->validate($request, [
           'tag' => 'required'
        ]);

        Tag::create([
           'tag' => $request->tag
        ]);

        Session::flash('success', 'Tag created successfully');

        return redirect()->route('tags');
    }

    public function edit($id) {
        $tag = Tag::find($id);

        return view('back.tags.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
           'tag' => 'required'
        ]);

        $tag = Tag::find($id);
        $tag->tag = $request->tag;

        $tag->save();

        Session::flash('success', 'Tag updated successfully');

        return redirect()->route('tags');
    }

    public function destroy($id) {
        Tag::destroy($id);

        Session::flash('success', 'Tag deleted successfully');

        return redirect()->back();
    }
}
