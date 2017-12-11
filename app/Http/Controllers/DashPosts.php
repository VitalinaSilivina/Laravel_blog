<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashPosts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post=Posts::orderby('created_at','asc')->paginate(5);
        //select(['id', 'title', 'description','name','created_at'])
            //->where('author_name', $request->user()->name)->get();

        return view('admin.pages.index')->with(['posts' => $post,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guest())
            //if (Auth::user()->id)
        {
            return redirect('/');
        }
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Posts();

        $post->title =$request->title;
        $post->description =$request->description;
        $post->author_name=Auth::user()->name;
        $post->user_id=Auth::user()->id;
        $post->save();

        $request->session()->flash('success', 'Запись опубликована');

        return view('admin.pages.show')->withPost($post);

        //return redirect()->route('show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =Posts::find($id);

        //return view('admin.pages.show')->withPost($post);
        return redirect()->route('show', $post->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Posts::find($id);
        $post->delete();
        //return view('admin.pages.index');
        return redirect()->route('/');
    }
}
