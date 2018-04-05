<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      /**
       *
       * Is there any category?
       */
        $categories = Category::all();
        if($categories->count() == 0)
        {
            Session::flash('info', 'You must have some categories to create a post');
            return redirect()->back();
        }

        return view('back.posts.create')->with('categories', $categories)
                                              ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'cat_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
          'title' => $request->title,
          'content' => $request->content,
          'featured' => 'uploads/posts/'. $featured_new_name,
          'cat_id' => $request->cat_id,
          'slug' => str_slug($request->slug)
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Succesfully post created');
        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('back.posts.edit')->with('post', $post)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'cat_id' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->cat_id = $request->cat_id;
        $post->save();

        Session::flash('success', 'Succesfully, post updated');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'Post was trashed');
        return redirect()->back();
    }

    public function trashed()
    {
       $posts = Post::onlyTrashed()->get();
       return view('back.posts.trashed')->with('posts', $posts);
    }

    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        Session::flash('success', 'Post was deleted');
        return redirect()->back();
    }

    public function restore($id)
    {
       $post = Post::withTrashed()->where('id', $id)->first();
       $post->restore();
       Session::flash('success', 'Succesfully restore post');
       return redirect()->route('posts');
    }
}
